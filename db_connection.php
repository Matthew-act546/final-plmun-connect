<?php

$db_server = 'localhost';
$db_user = 'root';
$db_pass = "";
$db_name = "plmun_connect";
$connect = "";
$port = "3307";

try {
  $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name, $port);
} catch(mysqli_sql_exception) {
  echo "You're not connected";
}   
if($connect) {
  echo "You're connected";
}

?>