<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  $authenticated = false;

  if (isset($_SESSION["ie_email"])) {
    $authenticated = true;
  }
?>
