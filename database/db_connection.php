<?php

$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'plmun_connect';
$port = '3307';

// Create the mysqli connection
$mysqli = new mysqli($db_server, $db_user, $db_pass, $db_name, $port);

// Check for connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Optional: echo "You're connected";

// RETURN the $mysqli object
return $mysqli;
?>
