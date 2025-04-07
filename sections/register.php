<?php
  include('../db_connection.php');


  if(isset($_POST["signUp"])) {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $studentNum = $_POST["student_num"];
    $emailIE = $_POST["email"];
    $program = $_POST["program"];
    $password = md5($_POST["password"]);
    $confirmPass = md5($_POST["confirm_password"]);

    $checkEmail = "SELECT * FROM users WHERE ie_email = '$emailIE'";
    $result = $connect->query($checkEmail);

    if ($result && $result->num_rows > 0) {
        echo "email address exists!";
    } else {
      $insertQuery = "INSERT INTO users(first_name, last_name, ie_email, student_num, program, password)
                      VALUES ('$firstName', '$lastName', '$emailIE', '$studentNum', '$program', '$password')";
      
      if ($connect->query($insertQuery) === TRUE) {
        echo "Registration successful!";
      } else {
        echo "Error: " . $connect->error;
      }
    }
  }

  
?>