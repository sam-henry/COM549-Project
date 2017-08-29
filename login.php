 <?php
 //Start Session and object
 session_start();
 ob_start();
 //sync the time between the server and teh client
 date_default_timezone_set('UTC');
 include ('db_fns.php');
 try {
 
	//Validate the form has been completed
	if ((empty($_POST["username"]))
	|| (empty($_POST["password"]))){
		//If not ouput error message and input form
		throw new Exception("Please complete all fields");
		
	}
	//Read in the values from the form 	
	$username = $_POST['username']; 
	$password = $_POST['password'];
	//Create variables to store the DB conection values
		
	//connect to the DB
	$db = db_connect();
	

	//Input Validation 
	//Verify the Username is entered in the correct format i.e. email address
	if (!preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $username)){
		throw new Exception('Not a valid username');
	} 
	//Confirm DB connection was successfull 
	if (mysqli_connect_errno()) 
	{
		throw new Exception("Could not connect to database");
	}
	else
	{
		//If connection is successfull, prepare and execute query to search the DB for the username
		$query = "SELECT * FROM uunch_users WHERE email = '$username'";
	
		$stmt = $db->query($query);
		
	}
	//ICheck if the user is found in the DB
	if (@$stmt->num_rows != 1){
		throw new Exception('User is not registered');
	}
	//run the query again
	$result = $db->query($query);
	//get the user details and store them in the array $row
	$row = $result->fetch_assoc();
	//Check if the passwords match. Note the password entered has been hashed the same as the one stored
	if ($row['password'] !== sha1($password)){
			throw new Exception('Incorrect password');
	}
	//If user exists and the passowrd matches. Then set session variables to logged in.
	$_SESSION["username"] = $username;
	$_SESSION["loggedIn"] = true;
	//redirect to landing page
	header('Location: landing.php');
	
	
	}
	//Catch block tp catch errors. 
	catch (Exception $e){
		//out put error message and the input form
		echo $e->getMessage();
		include('login_form.html');
	}
?>