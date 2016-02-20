<div class="col-sm-6">
	<h1> Login  Here </h1>
	
	<form action="mysuccess.php" method="post">

		<div class="form-group">
		    <label for="exampleInputEmail1">Username</label>
		    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
		</div>

		<div class="form-group">
		    <label for="exampleInputPassword1" name="pass">Password</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
		</div>
			
		<div class="form-group">
		    <label for="exampleusertype1">Select your category </label></br>
		    <input type="radio" name="user_type" value="Student" checked> Student<br>
			<input type="radio" name="user_type" value="Professor"> Professor<br>
			<input type="radio" name="user_type" value="Parent"> Parent
		</div>

		<button type="submit" class="btn btn-success" name="LOGIN">Login</button>
	</form>
</div>