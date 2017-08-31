<?php
	$id = $_GET['id'];
	include ('db_fns.php');
?>

<!DOCTYPE html>
<html>
  <head>
   <title>UUnch Registration Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen"/>
  </head>
  <body>
   <a href = "index.php" ><h1>UUnch</h1></a>
	
	
	<div class = "container-fluid">
	<div class = "row">
	<div class = "col-md-offset-1 col-md-3">
<?php
	$db = db_connect();
	$query = "SELECT * FROM uunch_reviews WHERE reviewid = '$id'";
	$result = $db->query($query);
	$review = $result->fetch_assoc();
	
	$query = "SELECT * FROM uunch_users WHERE userid ='".$review['userid']."' ";
	$result = $db->query($query);
	$author = $result->fetch_assoc();
	
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
	
	echo "<div class =\"row\">
	<div class = \"col-md-offset-1 col-md-11\">
	<h2>Comments</h2>
	
		<div class = \"media\">
				<div class = \"media-left media-middle\">
					<img class = \"media-object img-rounded\" src = \"images\angel.png\" height='40' width='40'>
				</div>
			<div class = \"media-body\">
				
				<h3 class = \"media-heading\">Test Test <small><i>Posted on February 19, 2016</i></small></h3>
			
				<div class = \"media\"> Lorem ipsum dolor sit amet, 
				consectetur adipiscing elit, sed do eiusmod tempor incididunt 
				ut labore et dolore magna aliqua
				</div>
			</div>
		</div></br>";
		
	echo "<form class = \"form-horizontal\"  action=\"comment.php\" method=\"post\">
	<fieldset>
	<div class=\"form-group\">
		 <label class = \"control-label col-md-2\" for=\"comment\" >Comment</label>
		 <div class=\"col-md-9\">
			<textarea class=\"form-control\" id = \"comment\" rows=\"5\" name=\"firstname\"></textarea>
		</div>
	</div>
	
	<div class=\"form-group\">
		 <div class = \"col-md-offset-10 col-md-2\" >
			<input type=\"submit\" value=\"Submit\" />
		</div>
	</div>
	</fieldset>
    </form>
	";
	
	
	
?>
  