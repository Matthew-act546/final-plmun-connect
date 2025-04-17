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
          <h2 class="card-title text-center mb-4">Edit Event</h2>
          <form method="POST">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" id="title" value="" name="title" class="form-control" >
              <small style="color: red;"><?= $event_title_error?></small>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter event details..."></textarea>
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
