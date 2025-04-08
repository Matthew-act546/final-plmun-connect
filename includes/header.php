<?php 
  session_start();

  $authenticated = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PLMun Connect</title>
  <link rel="icon" type="image/png" href="./assets/images/Logo.png">
  <link rel="stylesheet" href="assets/custom.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-primary">
    <div class="container-fluid d-flex align-items-center justify-content-between ms-3">
      <a class="navbar-brand text-white" href="index.php">  
        <img src="./assets/images/Logo.png" style="height: 50px;">
        PLMun Connect
      </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse me-5" id="navbarNav">
      <?php 
        if($authenticated) {
      ?>

      <ul class="navbar-nav ms-auto">

      <li class="nav-item">
        <a class="nav-link text-white" href="./eventDisplaySelected.php">
          <img src="../assets/images/Calendar.svg">Events</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active text-white" href="./createEvent.php">Create Event</a>
      </li>

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
        <a class="nav-link text-white" href="../sections/settings.php">
          <img src="../assets/images/profileIcon.svg" style="height: 30px; width: 30px;"></a>
      </li>

      </ul>

      <?php 
        } else {
      ?>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active text-white" href="./sections/main.php">Main</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" href="./index.php#home">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white" href="./index.php#features-section">Features</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white me-2" href="./index.php#about-section">About</a>
        </li>
        
        <li class="nav-item">
          <a class="btn btn-outline-warning" href="./login.php">Login</a>
        </li>        
      </ul>
      <?php 
        }
      ?>
    </div>
  </nav>