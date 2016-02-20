<!DOCTYPE html>
<html>
<head>
	<title>PHP simple login</title>
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
    rel="stylesheet">
  <?php 
  		// Start the session
  		session_start();

  		// unset all seasson variable 
		session_unset(); 

		// destroy the session 
		session_destroy(); 
  ?>

</head>
<body>
	<div class="container">
	<?php
		header('Location: login_part2.php');
	?>

	</div>


</body>
</html>