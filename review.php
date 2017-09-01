<?php
session_start();
 ob_start();
	$id = $_GET['id'];
	include ('db_fns.php');
$_SESSION['reviewid'] = "$id";

include('html_header_and_navbar.php');

	$db = db_connect();
	$query = "SELECT * FROM uunch_reviews WHERE reviewid = '$id'";
	$result = $db->query($query);
	$review = $result->fetch_assoc();
	
	$query = "SELECT * FROM uunch_users WHERE userid ='".$review['userid']."' ";
	$result = $db->query($query);
	$author = $result->fetch_assoc();
	
	echo "
	<div class = \"container-fluid\">
	<div class = \"row\">
	<div class = \"col-md-offset-1 col-md-3\">";
	
	echo "
	<img class = \"img-rounded\" src = \"".$review['reviewimage']."\" height='200' width='200'>
	</div>";
	
	echo "<div class = \" col-md-7\">
	<h2>".$review['reviewtitle']."</h2>
	<p>".$review['reviewsummary']."</p>
	</div>
	<div class \"col-md-1\">
	</div>
	</div>";
	
	echo "<div class = \"row\">
	<div class = \"col-md-offset-1 col-md-10\">
	<p>".$review['reviewcontent']."</p>
	</div>
	<div class =\"col-md-1\">
	</div>
	</div>";
	
	
	
	echo "<div class = \"row\">
	<div class = \"col-md-offset-1 col-md-11\">
		<div class = \"media\">
			<div class = \"media-left media-middle\">
				<img class = \"media-object img-rounded\" src = \"".$author['avatar']."\" height='40' width='40'>
			</div>
		<div class = \"media-body\">
			
			<h3 class = \"media-heading\">".$author['firstname']." ".$author['surname']."</h3>
			
			<div class = \"media\">".date_format(date_create($review['reviewdatereg']),"d/m/Y H:i")."
			</div>
		</div>
		</div>
	</div>
	";
	//Comments
	
	echo "<div class =\"row\">
	<div class = \"col-md-offset-1 col-md-11\">
	<h2>Comments</h2>";
	
	$query = "SELECT * FROM uunch_comments WHERE reviewid = '$id'";
	$result = $db->query($query);
	
	if ($result->num_rows)
	{	
	while($comment = $result->fetch_assoc())
{
		
	$db = db_connect();
	$query = "SELECT * FROM uunch_users WHERE userid = '".$comment['userid']."'";
	$userresult = $db->query($query);
	$commentuser = $userresult->fetch_assoc();

	
	echo "<div class = \"media\">
				<div class = \"media-left media-middle\">
					<img class = \"media-object img-rounded\" src = \"".$commentuser['avatar']."\" height='40' width='40'>
				</div>
			<div class = \"media-body\">
				
				<h3 class = \"media-heading\">".$commentuser['firstname']." ". $commentuser['surname']." <small><i>Posted on ".date_format(date_create($comment['commentdatereg']),"d F Y")."</i></small></h3>
			
				<div class = \"media\">".$comment['comment'] ."
				</div>
			</div>
		</div></br>";
}
	}
		
	echo "
	<form class = \"form-horizontal\"  action=\"comment.php\" method=\"post\">
	<fieldset>
	<div class=\"form-group\">
		 <label class = \"control-label col-md-2\" for=\"comment\" >Comment</label>
		 <div class=\"col-md-9\">
			<textarea class=\"form-control\" id = \"comment\" rows=\"5\" name=\"comment\"></textarea>
		</div>
	</div>
	
	<div class=\"form-group\">
		 <div class = \"col-md-offset-10 col-md-2\" >
			<input type=\"submit\" value=\"Submit\" />
		</div>
	</div>
	</fieldset>
    </form>
	</div>
	";
	
	include('html_footer.php');
?>


  