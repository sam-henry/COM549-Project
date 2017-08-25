<?php
//Validate the form is filed in 
	if ((empty($_POST["firstname"]))
	|| (empty($_POST["surname"]))
	|| (empty($_POST["email"]))
	|| (empty($_POST["password"]))
	|| (empty($_POST["confirmpw"]))
	|| (empty($_POST["dob"]))
	|| (empty($_POST["avatar"]))){
		//If not display error message and input form
		echo "<p>Please complete all fields</p>";
		include('registration.html');
		exit;
	}
	//Read in the values from the form and store the in variables		
	$firstname = $_POST['firstname']; 
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPw = $_POST['confirmpw'];
	$dob = $_POST['dob'];
	$avatar = $_POST['avatar'];
	//Create an array to map the user type to numerical value for the DB
	$avatarId = array(	'angel',
						'mouse',
						'nurse',
						'penguin',
						'pirate',
						'propeller',
						'warrior');
						
	echo "<p>$firstname</br>$surname</br>$email</br>$password</br>$confirmPw</br>$dob$avatar";
?>