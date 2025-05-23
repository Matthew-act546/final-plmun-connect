<?php
  session_start();
  include './database/db_func.php';
  $dbConnection = getDatabaseConnection();

  if (isset($_SESSION["ie_email"])) {
    header('location: /index.php');
    exit;
  }

  $firstName = "";
  $lastName = "";
  $studentNum = "";
  $emailIE = "";
  $program = "";
  $password = "";
  $confirmPass = "";

  $firstName_error = "";
  $lastName_error = "";
  $studentNum_error = "";
  $emailIE_error = "";
  $program_error = "";
  $password_error = "";
  $confirmPass_error = "";

  $error = false;

  if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $studentNum = $_POST["student_num"];
    $emailIE = $_POST["email"];
    $program = $_POST["program"];
    $password = $_POST["password"];
    $confirmPass = $_POST["confirm_password"];

    if(empty($firstName)) {
      $firstName_error = "First name is required";
      $error = true;
    }
  
    if(empty($lastName)) {
      $firstName_error = "Last name is required";
      $error = true;
    }
  
    if($studentNum < 7 && $studentNum >8) {
      $studentNum_error = "8 is the number of student number";
      $error = true;
    }
  
    if(!preg_match("/^[a-zA-Z0-9._%+-]+@plmun\.edu\.ph$/", $emailIE)){
      $emailIE_error = "Email format incorrect not ie";
      $error = true;
    }

    // verify if the emeail is exist
    $statement = $dbConnection->prepare("SELECT * FROM users WHERE ie_email = ? ");
    $statement->bind_param('s', $emailIE);
    $statement->execute();
    $statement->store_result();
    if($statement->num_rows > 0) {
      $emailIE_error = "Email is already use!";
      $error = true;
    }
    $statement -> close();


    if($program == "" || $program == "notProgram") {
      $program_error = "Not a valid program";
      $error = true;
    }
  
    if(strlen($password) < 8) {
      $password_error = "Password must have atleast 8 characters";
      $error = true;
    }
  
    if ($confirmPass !== $password) {
      $confirmPass_error = "Password and confirm password do not match.";
      $error = true;
    }

    // if there are no error here
    
    if(!$error) {
      $activation_token = bin2hex(random_bytes(16));

      $activation_token_hash = hash("sha256", $activation_token);

      $mysqli = require __DIR__ . "/database/db_connection.php"; //error?

      $sql =(
        "INSERT INTO users (first_name, last_name, ie_email, student_num, program, password, account_activation_hash)" . 
        "VALUES (?, ?, ?, ?, ?, ?, ?)"
      );

      $stmt = $mysqli->stmt_init();

      if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
      }

      $stmt->bind_param('sssisss', $firstName, $lastName, $emailIE, $studentNum, $program, $password, $activation_token_hash);


      if ($stmt->execute()) {
        $mail = require __DIR__ . "/mailer.php";
    
        $mail->setFrom("noreply@example.com");
        $mail->addAddress($emailIE);
        $mail->Subject = "Account Activation";
        $mail->Body = <<<END
    
        Click <a href="http://localhost/plmun-connect-final/activate-account.php?token=$activation_token">here</a> 
        to activate your account.
    
        END;
    
        try {
          $mail->send();
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
          exit;
        }
    
        header("Location: sign-up-success.php");
        exit;
      } 
    }
  }
?>



<!DOCTYPE html>
<html lang="en">

  <?php 
    include './section_components/header_includes/bootstrap.php';
  ?>

<body>

  <nav class="navbar navbar-expand-lg bg-body-primary">
      <div class="container-fluid d-flex justify-content-center">
        <a class="navbar-brand text-white" href="index.php"><img src="./assets/images/Logo.png" style="height: 50px;"> PLMun Connect</a>
      </div>
  </nav>

  <div class="container my-5">
  <div class="card shadow-lg mx-auto p-5" style="max-width: 55vw;">
    <h2 class="text-center">Sign up</h2>
    <form class="form-control-sm" method="post" >
      <label for="full_name" class="form-label">First and last name</label>
      <div class="input-group">
        <input type="text" id="full_name" name="first_name" aria-label="First name" class="form-control" value="<?= $firstName ?>" require>
        
        <input type="text" id="full_name" name="last_name" aria-label="Last name" class="form-control" value="<?= $lastName ?>" require>
        
      </div>
      <small class="text-danger"> <?= $firstName_error ?> </small>
      <small class="text-danger"> <?= $lastName_error ?></small>

      <div class="mb-3">
        <label for="email" class="form-label">Email address (Institutional Email)</label>
        <input type="email" name="email" value="<?= $emailIE ?>" class="form-control" id="email" placeholder="Enter your IE" require>
        <small class="text-danger"><?= $emailIE_error ?></small>
      </div>

      <div class="input mb-3">
        <label for="student_num" class="form-label">Student number</label>
        <input type="number" value="<?= $studentNum ?>" name="student_num" min="0" max="99999999" oninput="if(this.value.length > 8) this.value = this.value.slice(0, 8)" class="form-control" id="student_num" aria-describedby="emailHelp" placeholder="Enter your Student number" require>
        <small class="text-danger"><?= $studentNum_error ?></small>
      </div>
  
      <div class="mb-3">
        <p>Select your Program</p>
        <select class="form-select" value="<?= $program?>" name="program" aria-label="Default select example" aria-placeholder="Select your Program--" require>
          <option value="notProgram" selected>Lists of Programs</option>
          <option value="MBA">Master in Business Administration</option>
          <option value="MAE-EM">Master of Arts in Education, major in Educational Management</option>
          <option value="MAE-GC">Master of Arts in Education, major in Guidance and Counseling</option>
          <option value="MSCA">Master in Security and Correctional Administration</option>
          <option value="MIT">Master in Information Technology</option>
          <option value="MSCrim">Master of Science in Criminology</option>
          <option value="BACom">Bachelor of Arts in Communication</option>
          <option value="BSPsychology">Bachelor of Science in Psychology</option>
          <option value="BSBA-HR">BSBA Major in Human Resource Development Management</option>
          <option value="BSBA-MM">BSBA Major in Marketing Management</option>
          <option value="BSBA-OM">BSBA Major in Operations Management</option>
          <option value="BSA">Bachelor of Science in Accountancy</option>
          <option value="BSC">Bachelor of Science in Criminology</option>
          <option value="BSCS">Bachelor of Science in Computer Science</option>
          <option value="BSIT">Bachelor of Science in Information Technology</option>
          <option value="ACT">Associate in Computer Technology</option>
          <option value="DM">Doctor of Medicine</option>
          <option value="BEED-GEE">BEED General Elementary Education</option>
          <option value="BEED-MS">BSED Major in Science</option>
          <option value="BEED-ME">BSED Major in English</option>
          <option value="BEED-MSS">BSED Major in Social Science</option>
          <option value="BPA">Bachelor of Public Administration</option>
          <option value="BAPS">Bachelor of Arts in Political Science</option>
          <option value="BSSW">Bachelor of Science in Social Work</option>
        </select>
        <small class="text-danger"><?= $emailIE_error ?></small>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password"  class="form-control" maxlength="50" minlength="8" id="exampleInputPassword1" placeholder="Enter your desired password" require>
        <small class="text-danger"><?= $password_error ?></small>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" value="<?= $confirmPass ?>" maxlength="50" minlength="8" id="exampleInputPassword1" placeholder="Re-enter your password" require>
        <small class="text-danger"><?= $confirmPass_error ?></small>
      </div>

      <div style="text-align: center;">
        <button type="submit" class="btn btn-success" name="signUp">Sign Up</button>
      </div>

    </form>
    <div class="text-center mt-3">
      I already have an account <a href="login.php" class="text-primary">Back to Login</a>
    </div>

    <script src="../scripts.js"></script>
  </body>
  
</html>