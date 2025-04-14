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
      <div class="container d-flex justify-content-center align-items-center my-5 min-vh-50">
  <div class="container">
    <div class="card shadow-lg mx-auto" style="max-width: 600px;">
      <div class="card-body">
        <h2 class="card-title text-center mb-4">Create Event</h2>
        <form action="your-php-handler.php" method="POST">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter event details..." required></textarea>
          </div>

          <div class="mb-3">
            <label for="host" class="form-label">Host</label>
            <input type="text" id="host" name="host" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" id="time" name="time" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="venue" class="form-label">Venue</label>
            <input type="text" id="venue" name="venue" class="form-control" required>
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
