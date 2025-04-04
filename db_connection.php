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



// $servername = "localhost:3307";  // Use the updated port
// $username = "root";
// $password = "matthew123";
// $dbname = "mydb";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully!";

?>