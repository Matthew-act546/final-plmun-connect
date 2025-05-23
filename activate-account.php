<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database/db_connection.php";

$sql = "SELECT * FROM users
        WHERE account_activation_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
  die("token not found");
}

$sql = "UPDATE users
        SET account_activation_hash = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $user["id"]);

$stmt->execute();

?>
<!DOCTYPE html>
<html>
<?php 
  include './section_components/header_includes/bootstrap.php';
?>
<body>
    <div class="container  mt-5">
      <h1>Account Activated!</h1>

      <p>Account activated successfully. You can now
      <a href="login.php">log in</a>.</p>
    </div>
</body>
</html>