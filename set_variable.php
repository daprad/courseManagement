<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php 
	$_SESSION['User_id'] = $_POST['user_id'];
	$_SESSION['User_type'] = $_GET['user_type'];
	if(strcmp($_GET['user_type'],"Student")==0)
	{
		header('Location: student_dashboard.php');
	}
	elseif (strcmp($_GET['user_type'],"Professor")==0) 
	{
		header('Location: Prof_dashboard.php');
	}
?>