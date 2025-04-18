<?php 
  include './section_components/authenticated.php';
  include './database/db_func.php';
  if($authenticated == false) {
    header('location: dont-access.php');
  }
  $user_id = $_SESSION['id'];
  $first_name = $_SESSION['first_name'];

  $db = getDatabaseConnection();

  $stmt = $db->prepare("
    SELECT e.* 
    FROM events e
    INNER JOIN event_registrations r ON e.event_id = r.event_id
    WHERE r.user_id = ?
    ORDER BY e.EventDate
  ");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  
  include './section_components/header_includes/bootstrap.php';
  include './section_components/header_includes/nav.php';
  echo '
    <div class="container mt-3">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Hi ' . htmlspecialchars($first_name) .' </h1>
        <div id="datetimes" class="text-end"></div>
      </div>
      <p>This is your incoming events!</p>'
      ;

    
  while ($row = $result->fetch_assoc()) {
    $leave_event = '<form action="leave-event.php" class="d-inline-block mx-2" method="POST">
                      <input type="hidden" name="event_id" value="'. $row['event_id'] .'">
                      <button type="submit" class="btn btn-outline-danger ">Leave</button>
                    </form>';

    echo '
    <div class="container mt-3">
      <div class="card m-3 border border-success">
          <div class="card-header">
            <b>' . htmlspecialchars($row['Host']) . '</b>
          </div>
          <div class="card-body">
            <h5 class="card-title">' . htmlspecialchars($row['Title']) . '</h5>
            <p class="card-text">
              ' . htmlspecialchars($row['timeStart']) . ' - ' . htmlspecialchars($row['timeEnd']) . '<br>
              ' . htmlspecialchars($row['Host']) . '<br>
              ' . htmlspecialchars($row['Venue']) . '
            </p>
            <button type="button" class="btn btn-success d-inline-block" data-bs-toggle="modal" data-bs-target="#modal' . $row['event_id'] . '">
              View more 
            </button>
            '. $leave_event .'
            <!-- Modal -->
            <div class="modal fade" id="modal' . $row['event_id'] . '" tabindex="-1" aria-labelledby="modalLabel' . $row['event_id'] . '" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="d-flex justify-content-end mb-2">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container">
                      <h1>' . htmlspecialchars($row['Title']) . '</h1>
                      <p>' . nl2br(htmlspecialchars($row['Description'])) . '</p>
                      <p style="font-weight: bolder;">
                        ' . htmlspecialchars($row['EventDate']) . '<br>
                        ' . htmlspecialchars($row['timeStart']) . ' - ' . htmlspecialchars($row['timeEnd']) . '<br>
                        Venue: ' . htmlspecialchars($row['Venue']) . '
                      </p>
                      <h3 style="font-weight: 650;">Host</h3>
                      <p>' . htmlspecialchars($row['Host']) . '</p>
  
                    '. $leave_event .'
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- end modal -->
          </div>
        </div>
    </div>
    ';
    
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
