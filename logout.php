<?php
session_start();
session_destroy();  // End the session
header("Location: p1.php");  // Redirect to frontend
exit();
?>
