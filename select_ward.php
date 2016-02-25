<!DOCTYPE html>
<html>
<head>
	<title>Select Ward</title>
</head>
<body>

<h1> Please enter the details of your ward</h1>
 <form action="post_ward_selection.php" method = "POST">
	<div class="form-group">
	    <label for="exampleInputfname1">Firstname</label>
	    <input type="text" name="fname" class="form-control" id="exampleInputfname1" placeholder="fname" required>
	</div>

	<div class="form-group">
		    <label for="exampleInputlname1">Lastname</label>
		    <input type="text" name="lname" class="form-control" id="exampleInputlname1" placeholder="lname" required>
	</div>

	<div class="form-group">
	    <label for="exampleInputdob1">Date of Birth</label>
	    <input type="Date" name="dob" class="form-control" id="exampleInputdob1" placeholder="dob" required>
	</div>
  
  <button type="submit" class="btn btn-info" name="register" >Register</button>

</form> 


</body>
</html>