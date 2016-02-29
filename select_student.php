<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

if(isset($_POST['course_submit']))
{   
	//$user_id = mysql_escape_string($_SESSION["User_id"]);
	$course_id = $_POST['courseid'];
	//echo $course_id;

	$sql = "SELECT * FROM enrolled_in where Course_id = '$course_id' "; 

	$result_set = mysql_query($sql,$conn);
	?>

	<form action="select_grade.php?cid=<?php echo $course_id; ?>" method="post" enctype="multipart/form-data">
	<h4> Select the student ID </h4>
	<?php

	while($row=mysql_fetch_array($result_set))
	{
		//echo 'hello';
	    $std_id = $row['Student_id'];
	    ?>

	    <input type="radio" name="std_id" value=<?php echo $std_id; ?> > <?php echo $std_id; ?> <br>

	    <?php
	}
	?>
	<button type="submit" class="btn btn-success" name="student_submit">Submit</button>
	<?php
}
?>