<?php
session_start();
include 'database/db_func.php';
$db = getDatabaseConnection();

$user_id = $_SESSION['id'];
$event_id = $_POST['event_id'];

$stmt = $db->prepare("INSERT INTO event_registrations (user_id, event_id) VALUES (?, ?)");
$stmt->bind_param("ii", $user_id, $event_id);
$stmt->execute();

header("Location: index.php"); // or redirect back
exit;
?>
