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

		<form action="" method="post" enctype="multipart/form-data">
		<?php
		echo "<br>";

		$num_students = mysql_num_rows($result_set);
		if($num_students<1)
		{
			$valid = False;
			echo "<h3>No student registered for this course!!!</h3> ";
		}
		else
		{
			$valid = True;
			echo "<h3>Number of students enrolled in this course are ".$num_students."</h3>";
		}
		$_SESSION['c_id'] = $course_id;
		echo "<table>";
		while($row=mysql_fetch_array($result_set,MYSQL_ASSOC))
		{
			//echo 'hello';
		    $std_id = $row['Student_id'];
		    $sqlname = "SELECT * FROM student where Student_id = '$std_id' ";
		    $result = mysql_query($sqlname,$conn);
			$row1 = mysql_fetch_array($result, MYSQL_ASSOC);
			?>
			<tr>
			<td>
			<?php
			echo '<br>'.$row1['Firstname'].' '.$row1['Lastname'];
		    //header('Location: grade_form.php?sid='.$std_id.'&cid='.$course_id);
		    ?>
		    </td>

		    <td>
		    <fieldset id="<?php echo $std_id; ?>">
		    <input type="radio" name="<?php echo $std_id; ?>" value='EX'> EX </input>
			<input type="radio" name="<?php echo $std_id; ?>" value='A'> A </input>
			<input type="radio" name="<?php echo $std_id; ?>" value='B'> B</input>
			<input type="radio" name="<?php echo $std_id; ?>" value='C'> C </input>
			<input type="radio" name="<?php echo $std_id; ?>" value='D'> D </input>
			<input type="radio" name="<?php echo $std_id; ?>" value='P'> P </input>
			</fieldset>
			</td>
			</tr>

			<?php
		}
		echo "</table>";
		if($valid)
		{
			?>
			
			<button type="submit" class="btn btn-success" name="student_submit" value = '<?php echo $course_id; ?>' >Submit</button>	
			<?php
			$valid = False;
		}
	}

	if(isset($_POST['student_submit']))
	{
		//$num = count($_POST)-1;
		//echo "no. of grades assigned in this course are <strong>".$num."</strong>"."<br>";
		//echo "course id is : ".$_SESSION['c_id']."<br>";
		echo "<br><h4>Grades assigned Successfully!!!</h4>";
		$cid = $_SESSION['c_id'];
		foreach ($_POST as $key => $value) 
		{
			if(!is_numeric($value))
			{
				//echo $key."->".$value."<br>";
				$my_query = "UPDATE enrolled_in SET Grade = '$value' where Student_id='$key' and Course_id='$cid' "; 
				mysql_query($my_query,$conn);
			}
			
		}
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