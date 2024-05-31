<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Redirect to another page
header("Location: login.html");
exit();

// Flush the output buffer
ob_end_flush();
?>