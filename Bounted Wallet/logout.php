
<?php 
include 'config.php';
   //to ensure you are using same session
session_destroy(); //destroy the session
header("Location: index.html"); //to redirect back to "index.php" after logging out
exit();
?>