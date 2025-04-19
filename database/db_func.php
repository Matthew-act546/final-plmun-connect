<?php 
  function getDatabaseConnection() {
    $db_server = 'localhost';
    $db_user = 'root';
    $db_pass = "";
    $db_name = "plmun_connect";
    $connect = "";
    $port = "3307";// hi change this to 3306 to default because im running other projects so needed to be change

    $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name, $port);
    if($connect->connect_error) {
      die("error failed" . $connect -> connect_error);
    }

    return $connect;
  }
?>
