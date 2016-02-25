<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/student_dashboard_up.php"); ?>

<td id="page">


</td>

<?php include("includes/student_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>