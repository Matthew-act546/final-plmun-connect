<?php
  include 'C:\xampp\htdocs\plmun-connect-final\section_components\authenticated.php';
?>

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
        <a class="nav-link text-white" href="./event.php">
          <img src="./assets/images/Calendar.svg">Events</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active text-white" href="./createEvent.php">Create Event</a>
      </li>

      <div id="datetime">
        <script>
          function updateDateTime() {
              var now = new Date();
              var date = now.toLocaleDateString();
              var time = now.toLocaleTimeString();

              document.getElementById("datetime").innerHTML = date + "<br>" + time;
          }

          updateDateTime();

          setInterval(updateDateTime, 1000);
        </script>
      </div>

      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">
          <img src="./assets/images/notifBell.svg" style="height: 25px;"></a>
        </a>
      </li>

      <li class="nav-item">
        <div class="btn-group ">
          <a class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <img src="./assets/images/profileIcon.svg" style="height: 30px; width: 30px;">
          </a>
          <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-start">
            <li><a class="dropdown-item" href="./viewProfile.php">View Profile</a></li>
            <li><a class="dropdown-item" href="./settings.php">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li class="nav-item">
              <a class="dropdown-item" href="./logout.php">Logout</a>
            </li>     
          </ul>
        </div>
      </li>
    </ul>

    <?php 
      } else {
    ?>

    <ul class="navbar-nav ms-auto">
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