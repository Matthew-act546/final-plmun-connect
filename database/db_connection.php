<?php

$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'plmun_connect';
$port = '3307'; // hi change this to 3306 to default because im running other projects so needed to be change

$mysqli = new mysqli($db_server, $db_user, $db_pass, $db_name, $port);

// Check for connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
return $mysqli;
?>
