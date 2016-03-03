<?php session_start(); ?><html>
<head>
	<title>Registration status</title>
	 <link href="stylesheets/bootstrap.min.css"
    rel="stylesheet">

</head>
<body>
	<div class="container">
		<h2 class="bg-success"> Registration Status </h2>
		
		<p class="bg-info"> 
			<?php
			 echo  "<h3>".$_SESSION['message']."</h3>"; 
			?>
		</p>

		<p> Click <a href="login.php" > Here </a> to login or register </p>

	</div>


</body>
</html>