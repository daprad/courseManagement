<div class="col-sm-6">
	<h1> Register  Here </h1>
	<form action="mysuccess.php" method="post">
		<div class="form-group">
		    <label for="exampleInputusername1">Username</label>
		    <input type="text" name="username" class="form-control" id="exampleInputusername1" placeholder="username" required>
  		</div>

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

		<div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
		</div>

		<div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" name="pass1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
		</div>

		<div class="form-group">
		    <label for="exampleInputPassword1">Re-enter Password</label>
		    <input type="password" name="pass2" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
		</div>
			
		<div class="form-group">
		    <label for="exampleusertype1">Register As</label></br>
		    <input type="radio" name="user_type" value="Student" checked> Student<br>
			<input type="radio" name="user_type" value="Professor"> Professor<br>
			<input type="radio" name="user_type" value="Parent"> Parent
		</div>

		<button type="submit" class="btn btn-info" name="register">Register</button>
	</form>
</div>