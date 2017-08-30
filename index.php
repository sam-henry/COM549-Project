
<!DOCTYPE html>
<html>
  <head>
   <title>UUnch</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen"/>
  </head>
  <body>
    <h1>UUnch</h1>
	
	
	<div class = "container-fluid">
	<div class = "row">
	<div class = "col-sm-8">
	<h2>Latest Reviews</h2>
	
	<?php 
	include ('db_fns.php');
	//Need db conn and loop through all reviewd
	$db = db_connect();
	$query = "SELECT * FROM uunch_reviews";
	$result = $db->query($query);
	
	
	
	while($row = $result->fetch_assoc())
	{
		
echo "<div class = \"media\">
		<a class = \"media-left media-middle\" href = \"#\">
			<img class = \"media-object img-rounded\" src = \"".$row['reviewimage']."\" height='200' width='200'>
		</a>
	<div class = \"media-body\">
		<h4 class = \"media-heading\">".$row['reviewtitle']."</h4>
		<div class = \"media\">".$row['reviewsummary']."
		</div>
	</div>
	</div>";
	}
	
	?>
	
	</div>
	
	<div class = "col-sm-4">
	<h2>UUnch Rankings</h2>
	<table class = "table table-striped table-bordered table-hover table-condensed">
	<thead>
	<tr>
	<th>Food</th>
	<th>Score</th>
	<th>Vote</th>
	
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
	<td>".$row['foodtitle']."</td>
	<td>".$row['foodscore']."</td>
	<td><button type=\"button\" class=\"btn btn-default btn-sm\">
          <span class=\"glyphicon glyphicon-arrow-up\"></span>
        </button>
	<button type=\"button\" class=\"btn btn-default btn-sm\">
          <span class=\"glyphicon glyphicon-arrow-down\"></span>
        </button></td>
	</tr>";
	}
	?>
		
	<tbody>
	</table>
	</div>
	
	</div>
	</div>
  </body>
</html>