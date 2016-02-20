<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Hello</title>
</head>
<body>

<?php	
	if(isset($_SESSION['User_id']))
	{
		$myid = $_SESSION["User_id"];
		$mytype = $_SESSION["User_type"]; 	
	}
	else
	{
		echo "error";
	}
	
	echo $myid;
	echo $mytype;
?>

</body>
</html>
