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
		<?php include("includes/loginView.php"); ?>
		<?php include("includes/registerView.php"); ?>
	</div>

</div>

</body>
</html>
