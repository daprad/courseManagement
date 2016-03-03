<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>

<?php 

	if(isset($_POST['LOGIN_admin']))
	{

		//echo "hello";
		$username = mysql_escape_string($_POST['username']); 
		$pass = mysql_real_escape_string($_POST['password']);

		$msg = "";

		$sql = "SELECT * FROM admin where Name = '$username' and Password = '$pass' "; 

		if($result = mysql_query($sql,$conn)){
			$msg = "LOGIN SUCCESSFUL";
			$_SESSION['user'] = "admin";
			header('Location: admin_dashboard.php');
		}
		else
		{
			// means either email does not exist or password is wrong  
			$msg = "Invalid credentials";
			header('Location: error.php');
			//echo $msg;		 
		}
	}

?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>