<?php
  include './section_components/header_includes/bootstrap.php';


?>
  <nav class="navbar navbar-expand-lg bg-body-primary">
    <div class="container-fluid d-flex justify-content-center">
      <a class="navbar-brand text-white" href="./index.php"><img src="./assets/images/Logo.png" style="height: 50px;"> PLMun Connect</a>
    </div>
  </nav>
  
  <div class="container d-flex align-items-center justify-content-center" id="sign-up" style='min-height: 100vh;'>
    <div class="card p-5 shadow" style="width: 50%;">
      <h3 class="card-title text-center">Forgot Password</h3>
      <p class="text-center text-muted">Enter your email address and we’ll send you a link to reset your password.</p>
      <form action="./send-password-reset.php" method="POST">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Send Reset Link</button>
      </form>
      <a href="login.php" class="text-primary">Back to Login</a>
    
    </div>
  </div>
</body>
</html>