<html>
<head>
	<title>Course Management</title>
	<link href="stylesheets/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>

<div class="container">
	<div class="row">
		<h2 class="bg-info">
			<?php if(isset($msg)) { echo $msg; } ?>
		</h2>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			<h1> Admin Login  Here </h1>
			
			<form action="admin_success.php" method="post">

				<div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Name" required>
				</div>

				<div class="form-group">
				    <label for="exampleInputPassword1" name="pass">Password</label>
				    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
				</div>

				<button type="submit" class="btn btn-success" name="LOGIN_admin">Login</button>
			</form>
		</div>
	</div>

</div>

</body>
</html>
