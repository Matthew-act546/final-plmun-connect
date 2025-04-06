<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PLMun Connect: Create Events</title>
  <link rel="icon" type="image/png" href="../assets/images/Logo.png">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../custom.css">
  <script src="assets/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-primary">
    <div class="container-fluid d-flex align-items-center justify-content-between ms-3">
        <a class="navbar-brand text-white" href="./main.php">
        <img src="../assets/images/Logo.png" style="height: 35px;">PLMun Connect</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse me-5" id="navbarNav">
        <ul class="navbar-nav ms-auto">

        <div id="datetime">
        <script>
            var now = new Date();

            var date = now.toLocaleDateString();
            var time = now.toLocaleTimeString();

            document.getElementById("datetime").innerHTML = date + "<br>" + time;
        </script>
        </div>

        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">
            <img src="../assets/images/notifBell.svg" style="height: 25px;"></a>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="./sections/login.php">
            <img src="../assets/images/profileIcon.svg" style="height: 30px; width: 30px;"></a>
        </li>
        
    </ul>
    </div>
    </nav>

    <h1>Create Event</h1>


</body>
</html>