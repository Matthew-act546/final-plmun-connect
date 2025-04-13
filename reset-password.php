<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database/db_connection.php";

$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}
?>
<!DOCTYPE html>
<html>
<?php 
    include './section_components/header_includes/bootstrap.php';
?>
<body>
    <div class="container mt-5  mx-auto" style="width: 50%;">
        <h1>Reset/New Password</h1>

        <form method="POST" action="process-reset-password.php">
            <input type="hidden" name="token" value="<?= htmlspecialchars($_GET["token"] ?? '') ?>">

            <label for="password">New password</label>
            <input type="password" class="form-control border" style="width: 50%;" name="password" required>

            <label for="password_confirmation">Confirm password</label>
            <input type="password" class="form-control border" style="width: 50%;" name="password_confirmation" required>
            
            <button type="submit" class="btn btn-success mt-2">Reset</button>
        </form>
    </div>
</body>
</html>