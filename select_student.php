<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/Prof_dashboard_up.php"); ?>

<td id="page">

	<?php
	if(isset($_POST['course_submit']))
	{   
		//$user_id = mysql_escape_string($_SESSION["User_id"]);
		$course_id = $_POST['courseid'];
		//echo $course_id;

		$sql = "SELECT * FROM enrolled_in where Course_id = '$course_id' "; 
		$result_set = mysql_query($sql,$conn);
		?>

		<form action="submit_grade.php" method="post" enctype="multipart/form-data">
		<h4> Select the student ID </h4>
		<?php

		while($row=mysql_fetch_array($result_set,MYSQL_ASSOC))
		{
			//echo 'hello';
		    $std_id = $row['Student_id'];
		    $sqlname = "SELECT * FROM student where Student_id = '$std_id' ";
		    $result = mysql_query($sqlname,$conn);
			$row1 = mysql_fetch_array($result, MYSQL_ASSOC);
			echo $row1['Firstname'];
		    //header('Location: grade_form.php?sid='.$std_id.'&cid='.$course_id);
		    ?>
		    <fieldset id="group<?php echo $std_id; ?>">
		    <input type="radio" name="group<?php echo $std_id; ?>" value='EX?sid=<?php echo $std_id.'&';?>cid=<?php echo $course_id;?>'> EX </input>
			<input type="radio" name="group<?php echo $std_id; ?>" value='A?sid=<?php echo $std_id.'&';?>cid=<?php echo $course_id;?>'> A </input>
			<input type="radio" name="group<?php echo $std_id; ?>" value='B?sid=<?php echo $std_id.'&';?>cid=<?php echo $course_id;?>'> B</input>
			<input type="radio" name="group<?php echo $std_id; ?>" value='C?sid=<?php echo $std_id.'&';?>cid=<?php echo $course_id;?>'> C </input>
			<input type="radio" name="group<?php echo $std_id; ?>" value='D?sid=<?php echo $std_id.'&';?>cid=<?php echo $course_id;?>'> D </input>
			<input type="radio" name="group<?php echo $std_id; ?>" value='P?sid=<?php echo $std_id.'&';?>cid=<?php echo $course_id;?>'> P </input>
			</fieldset>
			<br>

			<?php
		}
		echo 'exited from while loop';
		?>
		<button type="submit" class="btn btn-success" name="student_submit">Submit</button>
		<?php
	}
	?>
</td>
<?php include("includes/Prof_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}

?>