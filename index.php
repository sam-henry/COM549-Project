
<?php
session_start();
 ob_start();
include ('db_fns.php');



if (!empty($_POST['vote'])){
$vote = $_POST['vote'];
$db = db_connect();
	$query = "UPDATE uunch_poll SET foodscore = foodscore + 1 WHERE foodid = '$vote'";
	$result = $db->query($query);
}
	if(!empty($_SESSION) && isset($_SESSION['usertype'])){
	if ($_SESSION['usertype'] == '3'){
		include('admin_html_header_and_navbar.php');
	}
	}
	else{
		include('html_header_and_navbar.php');
	}

?>

	
	<div class = "container-fluid">
	<div class = "row">
	<div class = "col-md-7">
	<h2>Latest Reviews</h2>
	
	<?php 
	//Need db conn and loop through all reviewd
	$db = db_connect();
	$query = "SELECT * FROM uunch_reviews";
	$result = $db->query($query);
	
	
	
	while($row = $result->fetch_assoc())
	{
		
echo "<div class = \"media\">
		<a class = \"media-left media-middle\" href = \"review.php?id=".$row['reviewid']."\">
			<img class = \"media-object img-rounded\" src = \"".$row['reviewimage']."\" height='200' width='200'>
		</a>
	<div class = \"media-body\">
		<a href = \"review.php?id=".$row['reviewid']."\">
		<h3 class = \"media-heading\">".$row['reviewtitle']."</h3>
		</a>
		<div class = \"media\">".$row['reviewsummary']."
		</div>
	</div>
	</div>";
	}
	
	?>
	
	</div>
	<div class = "col-md-1">
	</div>
	
	<div class = "col-md-4">
	<h2>UUnch Rankings</h2>
	<form class = "form-inline"  action="index.php" method="post">
	<fieldset>

	<table class = "table table-striped table-bordered table-hover ">
	<thead>
	<tr>
	<th>Food</th>
	<th>Score</th>
	<th></th>
	
	</tr>
	</thead>
	
	<tbody>
	<?php
	// Need php conn to db and loop through all food items
	$db = db_connect();
	$query = "SELECT * FROM uunch_poll ORDER BY foodscore DESC";
	$stmt = $db->query($query);
	
	while($row = $stmt->fetch_assoc())
	{
	echo "<tr>
	<td>
	<a href = \"review.php?id=".$row['reviewid']."\">
	".$row['foodtitle']."
	</a>
	</td>
	
	<td>".$row['foodscore']."</td>
	<td>
        <label><input type=\"radio\" name = \"vote\" value = \"".$row['foodid']."\">Vote</label>
	</td>
	</tr>";
	}
	?>
		
	<tbody>
	</table>

			 <div class = "col-md-offset-8 col-md-4" >
				<input class = "btn-primary btn-lg" type="submit" value="vote" />
		</div>
		</fieldset>
		</form>
		
	</div>
	</div>
	</div>
<?php
	include('html_footer.php');
?>