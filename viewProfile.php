<?php 
    include 'C:\xampp\htdocs\plmun-connect-final\section_components\authenticated.php';
    if($authenticated == false) {
        header('location: dont-access.php');
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
            <h1 class="m-0">View Profile</h1>
            <div id="datetimes" class="text-end"></div>
        </div>
        <p>here is your profile</p>
        <p>
            Name: <?= $_SESSION['first_name'] . " " . $_SESSION['last_name'];?> <br>
            Student ID: <?= $_SESSION['student_num']?> <br>
            Program: <?= $_SESSION['program']?> <br>
            Institutional Email: <?= $_SESSION['ie_email']?> <br>
            Role: <?= $_SESSION['role']?> <br>
            Created: <?= $_SESSION['created_at']?> <br>
        </p>
        <a href="change-password.php" class="btn btn-success me-2">Change Password</a>
        <form action="delete-account.php" style="display: inline;" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? Your event will be deleted too and this action cannot be undone.');">
            <button type="submit" class="btn btn-outline-danger">Delete Account</button>
        </form>
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
