<?php 
  include './section_components/header_includes/bootstrap.php';
  include 'C:\xampp\htdocs\plmun-connect-final\section_components\authenticated.php';

  $email = "";
  $error = "";
  $password = "";

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
      $error = "Password or Email are required";
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
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your Institutional Email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" maxlength="50" minlength="8" id="password" placeholder="Enter your password">
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
          <label class="form-check-label" for="flexCheckIndeterminate">
            Remember me
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
</body>
</html>