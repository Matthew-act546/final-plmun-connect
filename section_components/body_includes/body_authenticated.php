<?php
  $first_name = $_SESSION['first_name'];

  include 'C:\xampp\htdocs\plmun-connect-final\database\db_func.php';
  $db_connection = getDatabaseConnection();

  $title = "";
  $statement = $db_connection->prepare("SELECT 
                                        event_id, 
                                        Title, 
                                        Description, 
                                        Host, 
                                        EventDate, 
                                        timeStart, 
                                        timeEnd,
                                        Venue 
                                        FROM events");

  $statement->execute();
  $result = $statement->get_result();
  $user_id = $_SESSION['id'];

  $check_stmt = $db_connection->prepare("SELECT * FROM event_registrations WHERE user_id = ? AND event_id = ?");
  $check_stmt->bind_param("ii", $user_id, $row['event_id']);
  $check_stmt->execute();
  $check_result = $check_stmt->get_result();

  $event_joined = "";
  

  echo '
  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="m-0">Welcome ' . htmlspecialchars($first_name) .' </h1>
      <div id="datetimes" class="text-end"></div>
    </div>

    <p>These are the Incoming Events at PLMun!</p>
  </div>
  ';
  
  
  while ($row = $result->fetch_assoc()) {
    if (date('Y-m-d') < $row['EventDate']) {
  
      $check_stmt = $db_connection->prepare("SELECT * FROM event_registrations WHERE user_id = ? AND event_id = ?");
      $check_stmt->bind_param("ii", $user_id, $row['event_id']);
      $check_stmt->execute();
      $check_result = $check_stmt->get_result();

      if ($check_result->num_rows > 0) {
        $event_joined = '<div class="mx-2 d-inline-block" style="width: auto;">You already joined at this event!</div>';
      } else {
        $event_joined = '
          <form action="register-event.php" class="d-inline-block" method="POST">
            <input type="hidden" name="event_id" value="'. $row['event_id'] .'">
            <button type="submit" class="btn btn-success ">Count me in!</button>
          </form>
        ';
      }
  
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
            ' . $event_joined  .'
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
  
                    ' . $event_joined . '
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- end modal -->
          </div>
        </div>
      </div>';
    }
  }
  
  

?>

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