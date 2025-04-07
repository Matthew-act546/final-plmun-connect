<?php
include 'db_connection.php'; // Update the path if needed

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $stmt = $connect->prepare("SELECT id FROM users WHERE ie_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    echo $stmt->num_rows > 0 ? "exists" : "available";
}
?>