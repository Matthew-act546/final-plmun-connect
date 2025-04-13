<?php

$mysqli = require __DIR__ . "/database/db_connection.php";

$token = $_POST["token"] ?? '';
$password = $_POST["password"] ?? '';
$confirm = $_POST["password_confirmation"] ?? '';

$errors = [];

// Validate token
if (!$token) {
  $errors[] = "Invalid token.";
} else {
  $token_hash = hash("sha256", $token);

  $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $token_hash);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if (!$user) {
    $errors[] = "Token not found.";
  } elseif (strtotime($user["reset_token_expires_at"]) <= time()) {
    $errors[] = "Token has expired.";
  }
}

// Validate password
if (strlen($password) < 8) {
  $errors[] = "Password must be at least 8 characters.";
}
if ($password !== $confirm) {
  $errors[] = "Passwords do not match.";
}

// If there are errors, show them
if (!empty($errors)) {
  foreach ($errors as $error) {
    echo "<p style='color:red;'>$error</p>";
  }
  echo "<a href='reset-password.php?token=" . htmlspecialchars($token) . "'>Go back</a>";
  exit;
}


$sql = "UPDATE users SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password, $user["id"]);
$stmt->execute();

echo "<h3>Password updated.</h3> You can now <a href='login.php'>login</a>.";
?>
