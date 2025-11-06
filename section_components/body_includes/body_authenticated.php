<?php
  $first_name = $_SESSION['first_name'];
  $user_id = $_SESSION['id'];

  include __DIR__ . '/../../database/db_func.php';

  $db_connection = getDatabaseConnection();

  $statement = $db_connection->prepare("SELECT 
                                        event_id, 
                                        Title, 
                                        Description, 
                                        Host, 
                                        EventDate, 
                                        timeStart, 
                                        timeEnd,
                                        Venue 
                                        FROM events
                                        ORDER BY EventDate ASC");
  $statement->execute();
  $result = $statement->get_result();

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

    if (date('Y-m-d') <= $row['EventDate']) {

      $check_stmt = $db_connection->prepare("SELECT * FROM event_registrations WHERE user_id = ? AND event_id = ?");
      $check_stmt->bind_param("ii", $user_id, $row['event_id']);
      $check_stmt->execute();
      $check_result = $check_stmt->get_result();

      if ($check_result->num_rows > 0) {
        $event_joined = '<div class="mx-2 d-inline-block" style="width: auto;">You already joined this event.</div>';
      } else {
        $event_joined = '
          <form action="register-event.php" class="d-inline-block" method="POST">
            <input type="hidden" name="event_id" value="'. $row['event_id'] .'">
            <button type="submit" class="btn btn-success">Count me in!</button>
          </form>
        ';
      }

      $participants_stmt = $db_connection->prepare("
        SELECT u.first_name, u.last_name 
        FROM event_registrations er
        JOIN users u ON er.user_id = u.id
        WHERE er.event_id = ?
      ");
      $participants_stmt->bind_param("i", $row['event_id']);
      $participants_stmt->execute();
      $participants_result = $participants_stmt->get_result();

      if ($participants_result->num_rows > 0) {
        $participants_html = '<ul style="list-style: none; padding-left:0;">';
        while ($participant = $participants_result->fetch_assoc()) {
          $participants_html .= '<li>' . htmlspecialchars($participant['first_name'] . ' ' . $participant['last_name']) . '</li>';
        }
        $participants_html .= '</ul>';
      } else {
        $participants_html = '<p>No participants yet.</p>';
      }

      echo '
      <div class="container mt-3">
        <div class="card m-3 border border-success">
          <div class="card-header"><b>' . htmlspecialchars($row['Host']) . '</b></div>
          <div class="card-body">
            <h5 class="card-title">' . htmlspecialchars($row['Title']) . '</h5>
            <p class="card-text">
              ' . htmlspecialchars($row['timeStart']) . ' - ' . htmlspecialchars($row['timeEnd']) . '<br>
              Venue: ' . htmlspecialchars($row['Venue']) . '
            </p>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal' . $row['event_id'] . '">
              View more
            </button>

            ' . $event_joined . '

            <!-- Modal -->
            <div class="modal fade" id="modal' . $row['event_id'] . '" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="d-flex justify-content-end mb-2">
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <h1>' . htmlspecialchars($row['Title']) . '</h1>
                    <p>' . nl2br(htmlspecialchars($row['Description'])) . '</p>
                    <p><b>Date:</b> ' . htmlspecialchars($row['EventDate']) . '<br>
                       <b>Time:</b> ' . htmlspecialchars($row['timeStart']) . ' - ' . htmlspecialchars($row['timeEnd']) . '<br>
                       <b>Venue:</b> ' . htmlspecialchars($row['Venue']) . '</p>

                    <h3>Host</h3>
                    <p>' . htmlspecialchars($row['Host']) . '</p>

                    <h3>Participants</h3>
                    ' . $participants_html . '

                    <br>' . $event_joined . '
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>';
    }
  }
?>

<script>
function updateDateTime() {
  var now = new Date();
  document.getElementById("datetimes").innerHTML =
    now.toLocaleDateString() + "<br>" + now.toLocaleTimeString();
}
updateDateTime();
setInterval(updateDateTime, 1000);
</script>
