

<?php
include ('db_fns.php');
try {
	//Validate the form is filed in 
	if ((empty($_POST["firstname"]))
	|| (empty($_POST["surname"]))
	|| (empty($_POST["email"]))
	|| (empty($_POST["password"]))
	|| (empty($_POST["confirmpw"]))
	|| (empty($_POST["dob"]))
	|| (empty($_POST["avatar"]))){
		//If not display error message and input form
		throw new Exception("Please complete all fields");	
	}
	//Read in the values from the form and store the in variables		
	$firstname = $_POST['firstname']; 
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPw = $_POST['confirmpw'];
	$dob = $_POST['dob'];
	$avatar = $_POST['avatar'];
	
	$db = db_connect();
	// Validation
	
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
	
	
		
	// Test DB connection for errors 	
	if (mysqli_connect_errno()) 
	{
		throw new Exception('Could not connect to database');
	}
	else
	{
		// Prepare and run query to check if user already exists in the DB
		$query = "SELECT * FROM uunch_users WHERE email = '$email'";

		$stmt = @$db->query($query);

	}	
		
	// check if the query found the user in the DB 
	if (@$stmt->num_rows > 0){
		throw new Exception('User already exists');
	}
	// Hash the password to be entered into the DB	
	$password = sha1($password);
	// Prepare and run query to insert user details into the Users table in the DB 
	// Note the avatarId corresponding to the avatar is inputed into the DB
	$query = "INSERT INTO uunch_users (firstname, surname, email, password, avatar, datereg, dob)
		VALUES ('$firstname', '$surname', '$email', '$password', '$avatar', now(),'$dob')";
		
	$stmt = $db->query($query);
	// Check if there is an error inserting the user into the DB
	if (!$stmt){
		throw new Exception('Failed to write to the database, Please try again?');
	}
	// If entered successfully output to the user and display Form for next user
	include ('html_header_and_navbar.php');
	echo "<div class = 'alert alert-success'>User registered successfully</div>";
	
	include('html_registration_form.php');
	include('html_footer.php');
	
	}//try block
	
	// Catch block to catch any errors in Validation
	catch (Exception $e){
		include('html_header_and_navbar.php');
		// Output error message and the input form
		echo "<div class = 'alert alert-danger'>".$e->getMessage()."</div>";

		include('html_registration_form.php');
		include('html_footer.php');
	}
	?>