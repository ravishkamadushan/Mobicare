<?php
// Start a new or resume the existing session
session_start();

// Destroy the session and clear all session data
session_destroy();

// Redirect the user to the login page or any other page you want after logout
header("Location: index.php");
exit();
?>
