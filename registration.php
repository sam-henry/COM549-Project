<?php
include db_fns.php;

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
	$db = db_connect()
	// Validation
	try {
	// confirm there are no numbers in the firstname 
	if (preg_match("/[0-9]+/", $firstname)){
		throw new Exception('Firstname cannot contain numbers');
	}
	// Confirm there are no numbers in the surname
	if (preg_match("/[0-9]+/", $surname)) {
		throw new Exception('Surname cannot contain numbers');
	}
	// Confirm email address is in the correct format
	if (!preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)){
		throw new Exception('Not a valid email adderess');
	} 
	// Confirm the passwords match
	if ($password !== $confirmPw){
		throw new Exception('Passwords do not match'); 
	}
	// Confirm valid User Type is selected
	if (!array_key_exists("$avatar",$avatarId)){
		throw new Exception('Please select valid Avatar');
	}
		
	// Test DB connection for errors 	
	if (mysqli_connect_errno()) 
	{
		echo "<p>Could not connect to database</p>";
	}
	else
	{
		// Prepare and run query to check if user already exists in the DB
		$query = "SELECT * FROM Users WHERE Username = '$email'";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($fName, $sName,$uName,$pWord,$ema,$dateReg,$userTyp);
		
	}	
		
	// check if the query found the user in the DB 
	if ($stmt->num_rows > 0){
		throw new Exception('User already exists');
	}
	// Hash the password to be entered into the DB	
	$password = sha1($password);
	// Prepare and run query to insert user details into the Users table in the DB 
	// Note the userTypeId corresponding to the userType is inputed into the DB
	$query = "INSERT INTO Users (Firstname, Surname, Username, Password, DateRegistered, UserType)
		VALUES (?, ?, ?, ?, now(), ?)";
	$stmt = $db->prepare($query);
	$stmt->bind_param('ssssi', $firstname, $surname, $email, $password, $userTypeId[$userType]);
	$stmt->execute();
	// Check if there is an error inserting the user into the DB
	if (!$stmt){
		throw new Exception('Failed to write to the database, Please try again?');
	}
	// If entered successfully output to the user and display Form for next user
	echo "User registered successfully";
	include('registration.html');
	
	
	}//try block
	
	// Catch block to catch any errors in Validation
	catch (Exception $e){
		// Output error message and the input form
		echo $e->getMessage();
		include('registration.html');
	}
	
?>
