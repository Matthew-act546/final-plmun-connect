<?php
$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 10);

$mysqli = require __DIR__ . "/database/db_connection.php";

$sql = "UPDATE users  
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE ie_email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {

  $mail = require __DIR__ . "/mailer.php";

  $mail->setFrom("noreply@example.com");
  $mail->addAddress($email);
  $mail->Subject = "Password Reset";
  $mail->Body = <<<END
  <h1>PLMun connect - forgot password</h1>
  <p> 
    Do you wish to change your password? Click 
    <a href="http://localhost/plmun-connect-final/reset-password.php?token=$token">here</a> 
    to reset your password. If not, please disregard this email.
  </p>

  END;

  try {
      $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
  }
}

echo "Message sent, please check your inbox.";
?>