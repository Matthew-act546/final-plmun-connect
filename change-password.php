<?php
  include './database/db_func.php';
  session_start();
  $error = false;

  $current_password_error = "";
  $new_password_error = "";
  $confirm_password_error = "";



  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $user_id = $_SESSION['id']; 
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $db = getDatabaseConnection();

    $stmt = $db->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($password);
    $stmt->fetch();
    $stmt->close();

  
    if (empty($current_password)) {
      $current_password_error = "Current password is empty";
      $error = false;
    } elseif (empty($new_password)) {
      $new_password_error = "New password is empty";
      $error = true;
    } elseif (empty($confirm_password)) {
      $confirm_password_error = "Confirm password is empty";
      $error = true;
    } elseif ($current_password != $password) {
      $current_password_error = "Current password is incorrect.";
      $error = true;
    } elseif ($new_password !== $confirm_password) {
      $new_password_error = "New passwords do not match.";
      $error = true;
    } else {
      $update = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
      $update->bind_param("si", $new_password, $user_id);
      $update->execute();

      header("location: success-change-passsword.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include './section_components/header_includes/bootstrap.php';
  include './section_components/header_includes/nav.php';
?>
<body>

  <div class="container my-5">
    <div class="card shadow-lg mx-auto p-5" style="max-width: 55vw;">
      <h2 class="text-center">Change password</h2>
      <form method="post">
        <div class="mb-3">
          <label for="current_password" class="form-label">Current Password</label>
          <input type="password" class="form-control" id="current_password" name="current_password">
          <small style="color: red;"><?= $confirm_password_error ?></small>
        </div>

        <div class="mb-3">
          <label for="new_password" class="form-label">New Password</label>
          <input type="password" class="form-control" id="new_password" name="new_password">
          <small style="color: red;"><?= $current_password_error ?></small>
        </div>

        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirm New Password</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password">
          <small style="color: red;"><?= $new_password_error ?></small>
        </div>

        <button type="submit" class="btn btn-success">Change Password</button>
      </form>
    </div>
  </div>
</body>
</html>