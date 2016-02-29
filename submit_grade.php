<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php

if(isset($_POST['grade_submit']))
{
	$grade = $_POST['grade'];
	$course_id = $_GET['cid'];	
	$std_id = $_GET['sid'];	

	$sql="UPDATE enrolled_in SET Grade='$grade' WHERE Course_id='$course_id' AND Student_id='$std_id' ";
	$res=mysql_query($sql);
	//$result1=mysql_fetch_array($res);   
	echo "Grade submitted successfully";
}
?>
