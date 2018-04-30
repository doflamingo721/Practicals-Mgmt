<?php

// Inialize session
session_start();

// Delete certain session
//unset($_SESSION['username']);
// Delete all session variables
 session_destroy();
 
 echo "<script>alert('You have successfully Logged out')</script>";

// Jump to login page
header('Location: loginMaster.php');

?>