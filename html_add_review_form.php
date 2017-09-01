	
	<div class = "container-fluid">
	<div class = "row">
	<div class = "col-md-9">
    <h1>Upload Review</h1>
	<form class = "form-horizontal"  action="admin_add_review.php" method="post">
	<fieldset>
		</datalist>
		
			<div class="form-group">
		 <label class = "control-label col-md-2" for="review_title">Title</label>
		 <div class="col-md-6">
			<input class="form-control" id="review_title" type="text" name="reviewtitle"/>
		</div>
	</div>
		<div class="form-group">
		 <label class = "control-label col-md-2" for="review_image">Image</label>
		 <div class="col-md-6">
			<input class="form-control" id="review_image" type="text" name="reviewimage"/>
		</div>
	</div>
	<div class="form-group">
		 <label class = "control-label col-md-2" for = "review_summary">Summary</label>
		 <div class="col-md-6">
			<textarea class="form-control" rows = '5' id = "review_summary" name="reviewsummary"/></textarea>
		</div>
	</div>
		<div class="form-group">
		 <label class = "control-label col-md-2" for = "review_summary">Review</label>
		 <div class="col-md-6">
			<textarea class="form-control" rows = '10'  id = "review_summary" name="review"/></textarea>
		</div>
	</div>
 	<div class="form-group">
		 <div class = "col-md-offset-2 col-md-10" >
			<input type="submit" value="Upload" />
		</div>
	</div>
	</fieldset>
    </form>
	
	</div>
	</div>
	</div>
