<?php
// Start session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to home page after logout
header("Location: index.html");
exit();
?>
