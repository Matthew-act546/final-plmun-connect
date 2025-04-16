<?php 
  include './section_components/authenticated.php';
  if($authenticated == false) {
    header('location: dont-access.php');
  }


  $event_title = "";
  $event_description = "";
  $event_host = "";
  $event_date = "";
  $event_time_start = "";
  $event_time_end = "";
  $event_venue = "";

  $event_title_error = "";
  $event_description_error = "";
  $event_host_error = "";
  $event_date_error = "";
  $event_time_start_error = "";
  $event_time_end_error = "";
  $event_venue_error = "";
  
  $hasError = false;

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $event_title = $_POST["title"];
    $event_description = $_POST["description"];
    $event_host = $_POST["host"];
    $event_date = $_POST["date"];
    $event_time_start = $_POST["timeStart"];
    $event_time_end = $_POST["timeEnd"];
    $event_venue = $_POST["venue"];
    

    if (empty($event_title)) {
      $event_title_error ="Event title is required.";
      $hasError = true;
    }
    
    if (empty($event_description)) {
      $event_description_error = "Event description is required.";
      $hasError = true;
    }
    
    if (empty($event_host)) {
      $event_host_error = "Event host is required.";
      $hasError = true;
    }
    
    if (empty($event_date)) {
      $event_date_error = "Event date is required.";
      $hasError = true;
    }
    
    if (empty($event_time_start)) {
      $event_time_start_error ="Event time is required.";
      $hasError = true;
    }

    if(empty($event_time_end)) {
      $event_time_end_error ="Event time is required.";
      $hasError = true;
    }
    
    if (empty($event_venue)) {
      $event_venue_error = "Event venue is required.";
      $hasError = true;
    }
    
    if(!$hasError) {
      include 'C:\xampp\htdocs\plmun-connect-final\database\db_func.php';
      $db_connection = getDatabaseConnection();
      $event_date = date('Y-m-d', strtotime($event_date));
      $event_time_start = date('H:i:s', strtotime($event_time_start));
      $event_time_end = date('H:i:s', strtotime($event_time_end));
      
      $sql = "INSERT INTO events (Title, Description, Host, EventDate, timeStart, timeEnd, Venue)
              VALUES (?, ?, ?, ?, ?, ?, ?);";

      $statement = $db_connection->prepare($sql);
      $statement->bind_param('sssssss', $event_title, $event_description, $event_host, $event_date, $event_time_start, $event_time_end, $event_venue);  
      $statement->execute();
      header("location: index.php");
    }
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
  <div class="container d-flex justify-content-center align-items-center my-5 min-vh-50">
    <div class="container">
      <div class="card shadow-lg mx-auto" style="max-width: 600px;">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Create Event</h2>
          <form method="POST">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" id="title" value="<?= $event_title?>" name="title" class="form-control" >
              <small style="color: red;"><?= $event_title_error?></small>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter event details..."><?= $event_description ?></textarea>
              <small style="color: red;"><?= $event_description_error?></small>
            </div>

            <div class="mb-3">
              <label for="host" class="form-label">Host</label>
              <input type="text" value="<?= $event_host?>" id="host" name="host" class="form-control">
              <small style="color: red;"><?= $event_host_error?></small>
            </div>

            <div class="mb-3">
              <label for="date" class="form-label">Date</label>
              <input type="date" id="date" name="date" value="<?= $event_date?>"  class="form-control">
              <small style="color: red;"><?= $event_date_error?></small>
            </div>

            <div class="mb-3">
              <label for="timeStart" class="form-label">Time start</label>
              <input type="time" id="timeStart" name="timeStart" value="<?= $event_time_start?>" class="form-control">
              <small style="color: red;"><?= $event_time_start_error ?></small>
            </div>

            <div class="mb-3">
              <label for="timeEnd" class="form-label">Time ending</label>
              <input type="time" id="timeEnd" name="timeEnd" value="<?= $event_time_end?>" class="form-control">
              <small style="color: red;"><?= $event_time_end_error ?></small>
            </div>

            <div class="mb-3">
              <label for="venue" class="form-label">Venue</label>
              <input type="text" id="venue" name="venue" value="<?= $event_venue?>" class="form-control">
              <small style="color: red;"><?= $event_venue_error ?></small>
            </div>

            <button type="submit" class="btn btn-success w-100">Submit</button>
          </form>
        </div>
      </div>
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
