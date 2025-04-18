<?php 
  include './section_components/authenticated.php';
  if($authenticated == false) {
    header('location: dont-access.php');
  }

  $created_by = $_SESSION['id'];

  include 'C:\xampp\htdocs\plmun-connect-final\database\db_func.php';
  $db_connection = getDatabaseConnection();
  $statement = $db_connection->prepare("SELECT * FROM events WHERE created_by = ?");

  $statement->bind_param('i', $created_by);

  $statement->execute();

  $result = $statement->get_result();

  include './section_components/header_includes/bootstrap.php';
  include './section_components/header_includes/nav.php';
  
  echo ' 
  <div class="container mt-3">  
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="m-0">My event</h1>
      <div id="datetimes" class="text-end"></div>
    </div>
    <p> Customize your events here!</p>
  </div>
  ';

  while ($row = $result->fetch_assoc()) { 
    if(date('Y-m-d') < $row['EventDate']) {
      echo '
      <div class="container mt-3">  
        <div class="card m-3 border border-success">
          <div class="card-header">
            <b>' . htmlspecialchars($row['Host']) .'</b> 
          </div>
          <div class="card-body">
            <h4 class="card-title">'. htmlspecialchars($row['Title']) .'</h4> 
            <p class="card-text"> <span class="lead fw-bold"> Description </span> <br>
              '. nl2br(htmlspecialchars($row['Description'])) .'
            </p>
            <p class="card-text">
            ' . htmlspecialchars($row['timeStart']) . ' - ' . htmlspecialchars($row['timeEnd']) . '<br>
            ' . htmlspecialchars($row['Host']) . '<br>
            ' . htmlspecialchars($row['Venue']) . '
            </p>
            <a href="edit.php?event_id=' . $row['event_id'] . '" class="btn btn-success me-2">
              Edit
            </a>

            <form method="POST" action="delete-event.php" style="display:inline;">
              <input type="hidden" name="event_id" value="'. $row['event_id'] .'">
              <button type="submit" class="btn btn-outline-danger me-2">Delete</button>
            </form>
          </div>
        </div> 
      </div>
      ';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<body>

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

</body>
</html>
