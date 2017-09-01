<?php
//Start the session to ensure correct session
session_start();
//destroy current session 
session_destroy();
//Redirect back to the mail logon screen
header("location: index.php");
exit();
?>