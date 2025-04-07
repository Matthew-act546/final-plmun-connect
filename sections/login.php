<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../custom.css">
  <script src="assets/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
  
  <nav class="navbar navbar-expand-lg bg-body-primary">
    <div class="container-fluid d-flex justify-content-center">
      <a class="navbar-brand text-white" href="../index.php"><img src="../assets/images/Logo.png" style="height: 50px;"> PLMun Connect</a>
    </div>
  </nav>
  
  <div class="container d-flex align-items-center justify-content-center" id="sign-up" style='min-height: 100vh;'>
    <div class="card p-5" style="width: 50%;">
    <form class="form-control-sm">
      <h1 class="text-center">Login</h1>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Institutional Email">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" maxlength="50" minlength="8" id="exampleInputPassword1"  placeholder="Enter your password">
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