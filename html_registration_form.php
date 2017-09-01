<div class = "container-fluid">
	<div class = "row">
	<div class = "col-md-9">
	<h1>Registration Form</h1>
	<form class = "form-horizontal"  action="registration.php" method="post">
	<fieldset>
	
	<div class="form-group">
		 <label class = "control-label col-md-2" for="userInfo_fname" >Firstname</label>
		 <div class="col-md-6">
			<input class="form-control" id = "userInfo_fname" type="text" name="firstname"/>
		</div>
	</div>
	<div class="form-group">
		 <label class = "control-label col-md-2" for="userInfo_fsname">Surname</label>
		 <div class="col-md-6">
			<input class="form-control" id = "userInfo_sname" type="text" name="surname"/>
		</div>
	</div>
	<div class="form-group">
		 <label class = "control-label col-md-2" for="userInfo_email">Email</label>
		 <div class="col-md-6">
			<input class="form-control" id="userInfo_email" type="text" name="email"/>
		</div>
	</div>
	<div class="form-group">
		 <label class = "control-label col-md-2" for = "userInfo_pwd">Password</label>
		 <div class="col-md-6">
			<input class="form-control" id = "userInfo_pwd" type="password" name="password"/>
		</div>
	</div>
	<div class="form-group">
		 <label class = "control-label col-md-2" for = "userInfo_cPwd">Confirm Password</label>
		 <div class="col-md-6">
			<input class="form-control" id = "userInfo_cPwd" type="password" name="confirmpw"/>
		</div>
	</div>
	<div class="form-group">
		 <label class = "control-label col-md-2" for = "userInfo_dob">Date of Birth</label>
		 <div class="col-md-6">
			<input class="form-control" id="userInfo_dob" type="date" name="dob"/>
		</div>
	</div>
	
	<div class="form-group">
		<label class = "control-label col-md-2">Avatar</label>
		<input type="radio" name = "avatar" value = "images\angel.png" checked><span>
			<img src = "images\angel.png" height='42' width='42' class = "img-rounded">
		</span>
		<input type="radio" name = "avatar" value = "images\mouse.png"><span>
			<img src = "images\mouse.png" height='42' width='42' class = "img-rounded">
		</span>
		<input type="radio" name = "avatar" value = "images\nurse.png"><span>
			<img src = "images\nurse.png" height='42' width='42' class = "img-rounded">
		</span>
		<input type="radio" name = "avatar" value = "images\penguin.png"><span>
			<img src = "images\penguin.png" height='42' width='42' class = "img-rounded">
		</span>
		<input type="radio" name = "avatar" value = "images\pirate.png"><span>
			<img src = "images\pirate.png" height='42' width='42' class = "img-rounded" >
		</span>
		<input type="radio" name = "avatar" value = "images\propeller.png"><span>
			<img src = "images\propeller.png" height='42' width='42' class = "img-rounded">
		</span>
		<input type="radio" name = "avatar" value = "images\warrior.png"><span>
			<img src = "images\warrior.png" height='42' width='42' class = "img-rounded">
		</span>
	</div>
	<div class="form-group">
		 <div class = "col-md-offset-2 col-md-10" >
			<input type="submit" value="Register" />
		</div>
	</div>
	</fieldset>
    </form>
	
	</div>
	</div>
	</div>