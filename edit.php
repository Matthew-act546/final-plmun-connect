<?php 
  include 'C:\xampp\htdocs\plmun-connect-final\database\db_func.php';
  $db_connection = getDatabaseConnection();

  $event_id = $_GET['event_id'];  
  $statement = $db_connection->prepare("SELECT * FROM events WHERE event_id = ?");
  $statement->bind_param('i', $event_id);
  $statement->execute();
  $result = $statement->get_result();
  
  $event = $result->fetch_assoc(); 

  $event_title = htmlspecialchars($event['Title']);
  $event_description = htmlspecialchars($event['Description']);
  $event_host = htmlspecialchars($event['Host']);
  $event_date = htmlspecialchars($event['EventDate']);
  $event_time_start = htmlspecialchars($event['timeStart']);
  $event_time_end = htmlspecialchars($event['timeEnd']);
  $event_venue = htmlspecialchars($event['Venue']);

  $event_title_error = "";
  $event_description_error = "";
  $event_host_error = "";
  $event_date_error = "";
  $event_time_start_error = "";
  $event_time_end_error = "";
  $event_venue_error = "";

  $hasError = false;

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $event_title = $_POST['title'];
    $event_description = $_POST['description'];
    $event_host = $_POST['host'];
    $event_date = $_POST['eventDate'];
    $event_time_start = $_POST['timeStart'];
    $event_time_end = $_POST['timeEnd'];
    $event_venue = $_POST['venue'];

    // Validation checks
    if (empty($event_title)) {
      $event_title_error = "Event title is required.";
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
      $event_time_start_error = "Event start time is required.";
      $hasError = true;
    }

    if ($event_time_start > $event_time_end) {
      $event_time_end_error = "End time cannot be earlier than start time.";
      $hasError = true;
    }

    if (empty($event_time_end)) {
      $event_time_end_error = "Event end time is required.";
      $hasError = true;
    }

    if (empty($event_venue)) {
      $event_venue_error = "Event venue is required.";
      $hasError = true;
    }

    if (!$hasError) {
      $stmt = $db_connection->prepare("UPDATE events SET Title = ?, Description = ?, Host = ?, EventDate = ?, timeStart = ?, timeEnd = ?, Venue = ? WHERE event_id = ?");
      $stmt->bind_param("sssssssi", $event_title, $event_description, $event_host, $event_date, $event_time_start, $event_time_end, $event_venue, $event_id);

      if ($stmt->execute()) {
        header("Location: my-event.php");
        exit;
      } else {
        echo "Error updating event.";
      }

      $stmt->close();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <?php include './section_components/header_includes/bootstrap.php'; ?>
<body>

  <?php include './section_components/header_includes/nav.php'; ?>
  
  <div class="container my-5">
    <div class="card shadow-lg mx-auto p-5" style="max-width: 55vw;">
      <h2 class="card-title text-center mb-4">Edit Event</h2>
      <form method="POST">
        <input type="hidden" name="event_id" value="<?= $event['event_id'] ?>">

        <!-- Event Title -->
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="<?= $event_title ?>">
          <small style="color: red;"><?= $event_title_error ?? '' ?></small>
        </div>

        <!-- Event Description -->
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter event details..."><?= $event_description ?></textarea>
          <small style="color: red;"><?= $event_description_error?></small>
        </div>

        <!-- Event Start Time -->
        <div class="mb-3">
          <label for="timeStart" class="form-label">Start Time</label>
          <input type="time" class="form-control" id="timeStart" name="timeStart" value="<?= $event_time_start ?>">
          <small style="color: red;"><?= $event_time_start_error ?? '' ?></small>
        </div>

        <!-- Event End Time -->
        <div class="mb-3">
          <label for="timeEnd" class="form-label">End Time</label>
          <input type="time" class="form-control" id="timeEnd" name="timeEnd" value="<?= $event_time_end ?>">
          <small style="color: red;"><?= $event_time_end_error ?? '' ?></small>
        </div>

        <!-- Event Host -->
        <div class="mb-3">
          <label for="host" class="form-label">Host</label>
          <input type="text" class="form-control" id="host" name="host" value="<?= $event_host ?>">
          <small style="color: red;"><?= $event_host_error ?? '' ?></small>
        </div>

        <!-- Event Venue -->
        <div class="mb-3">
          <label for="venue" class="form-label">Venue</label>
          <input type="text" class="form-control" id="venue" name="venue" value="<?= $event_venue ?>">
          <small style="color: red;"><?= $event_venue_error ?? '' ?></small>
        </div>

        <!-- Event Date -->
        <div class="mb-3">
          <label for="eventDate" class="form-label">Event Date</label>
          <input type="date" class="form-control" id="eventDate" name="eventDate" value="<?= $event_date ?>">
          <small style="color: red;"><?= $event_date_error ?? '' ?></small>
        </div>

        <button type="submit" class="btn btn-success">Update Event</button>
      </form>
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

  <?php include './section_components/footer.php'; ?>
</body>
</html>
