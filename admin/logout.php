<?php
// logout.php - Logs out the user
require_once('../lib/config.php');

// Call the logout function from session.php
logout();

// Redirect back to the login page
header("Location: login.php");
exit();
?>
