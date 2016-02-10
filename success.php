<!DOCTYPE html>
<html>
<head>
	<title>PHP simple login</title>
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
    rel="stylesheet">
  <?php 
  		// Start the session
		session_start();
		
  		if(!isset($_SESSION["Student_id"])){
  			// if session email variable is not set
  			// redirect user to login/register page

  			header('Location: login_part2.php');
  		}
  		
  ?>

</head>
<body>
	<div class="container">
		<h2 class="bg-success"> Login Succesful </h2>
		<p class="bg-info">

			Welcome <?php
			// user is logged in 
			// lets show his/her Student_id
			 echo  $_SESSION["Student_id"]; 
			?>
		</p>

		<p> Click <a href="logout.php" > Here </a> to log out </p>

	</div>


</body>
</html>