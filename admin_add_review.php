<?php
 //Start Session and object
 session_start();

 //sync the time between the server and teh client
 date_default_timezone_set('UTC');
 include ('db_fns.php');
 
if(!empty($_SESSION)){
try{
 if (($_SESSION["loggedIn"]) && ($_SESSION['usertype']==3)){
	if((empty($_POST["reviewtitle"]))
	|| (empty($_POST["reviewimage"]))
	|| (empty($_POST["reviewsummary"]))
	|| (empty($_POST["review"]))){
		//If not display error message and input form
		throw new Exception("emptyForm");	
	}
	
	 else {
		$reviewtitle = $_POST['reviewtitle']; 
		$reviewimage = $_POST['reviewimage']; 
		$reviewsummary = $_POST['reviewsummary']; 
		$review = $_POST['review']; 
		
		
		
		$db = db_connect();
		$query = "INSERT INTO uunch_reviews (reviewtitle, reviewsummary, reviewcontent, reviewimage, reviewdatereg, userid) 
			VALUES ('$reviewtitle', '$reviewsummary', '$review', '$reviewimage', now(), '".$_SESSION['userid']."')";
		$result = $db->query($query);
		
		$query1 = "INSERT INTO uunch_poll (foodtitle, reviewid) 
			VALUES ('$reviewtitle', (SELECT MAX(reviewid) FROM `uunch_reviews`))";
		$result1 = $db->query($query1);
		
		
		if($result){
			throw new Exception("Success");
		}
		else{
			throw new Exception("Failure");
		}
	 }
 }

 
 else {
	 throw new Exception('notAdmin');
 }
 }
 catch (Exception $e){
	 if ($e->getMessage() == "notAdmin"){
	 include('html_header_and_navbar.php');
		// Output error message and the input form
		echo "<div class = 'alert alert-danger'>Please log in as admin</div>";

		include('html_login_form.php');
		include('html_footer.php');
	 }

	 elseif($e->getMessage() == "Success"){
	 	 include('admin_html_header_and_navbar.php');
		// Output error message and the input form
		echo "<div class = 'alert alert-success'>Review uploaded successfully</div>";

		include('html_add_review_form.php');
		include('html_footer.php');
	}
 
  elseif ($e->getMessage() == "Failure"){
	 	 include('admin_html_header_and_navbar.php');
		// Output error message and the input form
		echo "<div class = 'alert alert-danger'>Something went wrong</div>";

		include('html_add_review_form.php');
		include('html_footer.php');
	}
	
	  elseif ($e->getMessage() == "emptyForm"){
	 	 include('admin_html_header_and_navbar.php');
		// Output error message and the input form
		echo "<div class = 'alert alert-danger'>please complete all fields</div>";

		include('html_add_review_form.php');
		include('html_footer.php');
	}
 }
 
 }
 
 else{
	 //If not logged in redirect to the home screen
	header('Location: index.php');
	
 }
 
 
?>