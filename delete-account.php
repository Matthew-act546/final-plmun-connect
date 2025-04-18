<?php
session_start();
include './database/db_func.php';

$db = getDatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_SESSION['id'];
  
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
