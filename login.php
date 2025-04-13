<?php 
  include './section_components/header_includes/bootstrap.php';
  include 'C:\xampp\htdocs\plmun-connect-final\section_components\authenticated.php';

  $ie_email = "";
  $error = "";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ie_email = $_POST["ie_email"];
    $pass = trim($_POST["password"]); // Trim whitespace

    if (empty($ie_email) || empty($pass)) {
        $error = "Password or Email are required";
    } else {
      include 'C:\xampp\htdocs\plmun-connect-final\database\db_func.php';
      $db_connection = getDatabaseConnection();

      $statement = $db_connection->prepare("SELECT id, first_name, last_name, ie_email, student_num, program, password, role, created_at, account_activation_hash FROM users WHERE ie_email = ?");

      $statement->bind_param('s', $ie_email);
      $statement->execute();
      $statement->bind_result($id, $first_name, $last_name, $ie_email, $student_num, $program, $password, $role, $created_at, $account_activation_hash);

      if ($statement->fetch()) {
        if ($pass === $password && $account_activation_hash == NULL) {
          $_SESSION["id"] = $id;
          $_SESSION["first_name"] = $first_name;
          $_SESSION["last_name"] = $last_name;
          $_SESSION["ie_email"] = $ie_email;
          $_SESSION["student_num"] = $student_num;
          $_SESSION["program"] = $program;
          $_SESSION["role"] = $role;
          $_SESSION["created_at"] = $created_at;

          header("location: index.php");
          exit;
        } else {
          $error = "Password invalid";
        }
      } else {
      $error = "Email invalid";
    }

    $statement->close();
  }
}

?>
  
  <nav class="navbar navbar-expand-lg bg-body-primary">
    <div class="container-fluid d-flex justify-content-center">
      <a class="navbar-brand text-white" href="./index.php"><img src="./assets/images/Logo.png" style="height: 50px;"> PLMun Connect</a>
    </div>
  </nav>
  
  <div class="container d-flex align-items-center justify-content-center" id="sign-up" style='min-height: 100vh;'>
    <div class="card p-5" style="width: 50%;">
    
      <form class="form-control-sm" method="post">
    
        <?php if (!empty($error)) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?= $error ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>

        <h1 class="text-center">Login</h1>
        <div class="mb-3">
          <label for="email" class="form-label">Institutional Email</label>
          <input type="email" value="<?= $ie_email; ?>" class="form-control" name="ie_email" id="email" aria-describedby="emailHelp" placeholder="Enter your Institutional Email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" maxlength="50" minlength="8" id="password" placeholder="Enter your password">
        </div>

        <div class="form-check">
          <input class="form-check-input" name="showPass" type="checkbox"  id="showPass">
          <label class="form-check-label" for="showPass">
            Show Password
          </label>
        </div>
        <div style="text-align: center;">
          <p><a href="forgot-password.php" class="text-primary">Forgot Password?</a></p>
        </div>
        <div style="text-align: center;">
          <button type="submit" class="btn btn-success">Log in</button>
        </div>
        <div class="text-center mt-3">
          <a href="sign-up.php" class="text-primary">New user? Register here</a>
        </div>
        
      </form>
    </div>
  </div>

  <script>
    document.getElementById("showPass").addEventListener("change", function () {
      const passwordInput = document.getElementById("password");
      passwordInput.type = this.checked ? "text" : "password";
    });
  </script>
</body>
</html>
