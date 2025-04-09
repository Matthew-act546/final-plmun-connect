<?php
  include './includes/bootstrap_import.php';
?>
  <nav class="navbar navbar-expand-lg bg-body-primary">
    <div class="container-fluid d-flex justify-content-center">
      <a class="navbar-brand text-white" href="./index.php"><img src="./assets/images/Logo.png" style="height: 50px;"> PLMun Connect</a>
    </div>
  </nav>
  
  <div class="container d-flex align-items-center justify-content-center" id="sign-up" style='min-height: 100vh;'>
    <div class="card p-5" style="width: 50%;">
      <h3 class="card-title text-center">Forgot Password</h3>
      <p class="text-center text-muted">Enter your email address and we’ll send you a link to reset your password.</p>
      <form action="/reset-password" method="POST">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
      </form>

      <button type="submit" class="btn btn-success" >Send Reset Link</button>

      <div class="text-center mt-3">
          <a href="login.php" class="text-primary">Back to Login</a>
      </div>
    </div>
  </div>
</body>
</html>