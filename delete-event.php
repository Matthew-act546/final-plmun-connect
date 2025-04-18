<?php
session_start();
include './section_components/authenticated.php';

if (!$authenticated) {
  header('Location: dont-access.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
  $created_by = $_SESSION['id'];
  $event_id = intval($_POST['event_id']); 

  include './database/db_func.php';
  $db_connection = getDatabaseConnection();

  $sql = "DELETE FROM events WHERE event_id = ? AND created_by = ?";
  $stmt = $db_connection->prepare($sql);
  $stmt->bind_param('ii', $event_id, $created_by);

  if ($stmt->execute()) {
    header('Location: my-event.php'); 
    exit;
  } else {
    echo "Failed to delete the event.";
  }
} else {
  echo "Invalid request.";
}
?>
