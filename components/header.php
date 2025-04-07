<?php 
  include("db_connection.php");
  

  try {
    $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name, $port);
  } catch(mysqli_sql_exception) {
    echo "You're not connected";
  }   
  if($connect) {
    echo "You're connected!";
  }

  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PLMun Connect</title>
  <link rel="icon" type="image/png" href="./assets/images/Logo.png">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="custom.css">
  <script src="assets/js/bootstrap.bundle.min.js" defer></script>
</head>