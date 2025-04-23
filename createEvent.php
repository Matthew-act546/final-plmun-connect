<?php 
    include './section_components/authenticated.php';
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
        <h1 class="m-0">Create a Event!</h1>
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
/* hehe bwoi */