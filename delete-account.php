<?php
session_start();
include './database/db_func.php';

$db = getDatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_SESSION['id'];

  // 1. Delete related registrations
  $delete_registrations = $db->prepare("DELETE FROM event_registrations WHERE user_id = ?");
  $delete_registrations->bind_param("i", $user_id);
  $delete_registrations->execute();
  $delete_registrations->close();

  // 2. Delete the user
  $delete_user = $db->prepare("DELETE FROM users WHERE id = ?");
  $delete_user->bind_param("i", $user_id);

  if ($delete_user->execute()) {
    session_destroy();
    header("Location: index.php?msg=account_deleted");
    exit();
  } else {
    echo "Failed to delete account.";
  }

  $delete_user->close();
}
?>
