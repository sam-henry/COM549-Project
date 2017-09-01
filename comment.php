<?php
 //Start Session and object
 session_start();

 //sync the time between the server and teh client
 date_default_timezone_set('UTC');
 include ('db_fns.php');
 
 
 if ($_SESSION["loggedIn"]){
	 if(empty($_POST["comment"])){
		header("Location: review.php?id=".$_SESSION['reviewid'].""); 
		 
	 }
	 else {
		$comment = $_POST['comment']; 
		$db = db_connect();
		$query = "INSERT INTO uunch_comments (userid, reviewid, comment) 
			VALUES ('".$_SESSION['userid']."', '".$_SESSION['reviewid']."', '$comment')";
		$result = $db->query($query);
		
		echo $_SESSION['userid'];
		echo $_SESSION['reviewid'];
		echo $comment;
		
		if($result){
			header("location: review.php?id=".$_SESSION['reviewid']."");
		}
		else{
			echo "Did not wirte to the DB";
		}
	 }
 }
 else{
	 //If not logged in redirect to the first logon screen
	header('Location: login_form.php');
 }
?>