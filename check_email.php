<?php
include 'db_connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['email'])) {
    $emailIE = $_POST['email'];

    // Check domain validity
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@plmun\.edu\.ph$/", $emailIE)) {
        echo "invalid";
        exit();
    }
}
?>
