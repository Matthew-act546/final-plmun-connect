<?php
session_start();
include './database/db_func.php';

if (!isset($_SESSION['id'])) {
  header("Location: dont-access.php");
  exit();
}

$user_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['event_id'])) {
  $event_id = $_POST['event_id'];
  $db = getDatabaseConnection();

  $stmt = $db->prepare("DELETE FROM event_registrations WHERE user_id = ? AND event_id = ?");
  $stmt->bind_param("ii", $user_id, $event_id);
  $stmt->execute();

  $stmt->close();
  $db->close();
}

header("Location: event.php");
exit();
?>