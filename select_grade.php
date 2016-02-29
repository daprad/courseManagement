<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

if(isset($_POST['student_submit']))
{   
	//$user_id = mysql_escape_string($_SESSION["User_id"]);
	$std_id = $_POST['std_id'];

	//if(isset($_SESSION['User_id']))
	//{
	$course_id = $_GET['cid'];	
	echo $course_id;
	//}
	//echo $course_id;
	?>
	<h4> Select the grade to be assigned </h4>

	<form action="submit_grade.php?sid=<?php echo $std_id.'&';?>cid=<?php echo $course_id;?> " method="post" >

	<input type="radio" name="grade" value='EX'> EX <br>
	<input type="radio" name="grade" value='A'> A <br>
	<input type="radio" name="grade" value='B'> B <br>
	<input type="radio" name="grade" value='C'> C <br>
	<input type="radio" name="grade" value='D'> D <br>
	<input type="radio" name="grade" value='P'> P <br>
	
	<button type="submit" class="btn btn-success" name="grade_submit">Submit</button>

	<?php
}
?>