<?php 
    include './section_components/authenticated.php';
    include 'C:\xampp\htdocs\plmun-connect-final\database\db_func.php';
    if($authenticated == false) {
        header('location: dont-access.php');
    }
    $user_id = $_SESSION['id'];

    $db = getDatabaseConnection();

    $stmt = $db->prepare("
        SELECT e.* 
        FROM events e
        INNER JOIN event_registrations r ON e.event_id = r.event_id
        WHERE r.user_id = ?
        ORDER BY e.EventDate
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
    echo '<h3>' . htmlspecialchars($row['Title']) . '</h3>';
    // Show more details
    }

?>
<!DOCTYPE html>
<html lang="en">

    <?php 
        include './section_components/header_includes/bootstrap.php';
    ?>
<body>

    <?php 
        include './section_components/header_includes/nav.php';
    ?>

<div class="container mt-3" style="min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Your incoming event list!</h1>
        <div id="datetimes" class="text-end"></div>
    </div>
</div>
    <script>
        function updateDateTime() {
            var now = new Date();
            var date = now.toLocaleDateString();
            var time = now.toLocaleTimeString();
            document.getElementById("datetimes").innerHTML = date + "<br>" + time;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>

    <?php 
        include './section_components/footer.php';
    ?>
</body>
</html>
