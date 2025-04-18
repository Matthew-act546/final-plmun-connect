<?php
session_start();
include './database/db_func.php';

$db = getDatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_SESSION['id'];

  // 1. Check if user has event registrations
  $check_events = $db->prepare("SELECT COUNT(*) FROM event_registrations WHERE user_id = ?");
  $check_events->bind_param("i", $user_id);
  $check_events->execute();
  $check_events->bind_result($event_count);
  $check_events->fetch();
  $check_events->close();

  // If user has events, redirect to my-event.php to handle the events
  if ($event_count > 0) {
    header("Location: my-event.php");
    exit();
  }

  // 2. If no events, proceed with account deletion

  // Delete related registrations
  $delete_registrations = $db->prepare("DELETE FROM event_registrations WHERE user_id = ?");
  $delete_registrations->bind_param("i", $user_id);
  $delete_registrations->execute();
  $delete_registrations->close();

  // Delete the user
  $delete_user = $db->prepare("DELETE FROM users WHERE id = ?");
  $delete_user->bind_param("i", $user_id);

  if ($delete_user->execute()) {
    session_destroy();
    header("Location: index.php");
    exit();
  } else {
    echo "Failed to delete account.";
  }

  $delete_user->close();
}
?>
