<?php

session_start();
 ob_start();
 //sync server and client to the same time zone
 date_default_timezone_set('UTC');
 //check if user is logged in
if ($_SESSION['loggedIn']){

echo "<p>login successful</p>";
}
else
{
	header('Location: login_form.html');
}

?>