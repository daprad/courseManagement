<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/student_dashboard_up.php"); ?>

		<td id="page">
		
		<?php
		if(isset($_POST['submit']))
		{
			
			$fname = mysql_real_escape_string($_POST['fname']);
			$lname  = mysql_real_escape_string($_POST['lname']);
			$dob = mysql_real_escape_string($_POST['dob']);

			$sql = "SELECT * FROM student where Firstname = '$fname' and Lastname = '$lname' and DOB = '$dob' ";
			$result = mysql_query($sql,$conn);
			$count = mysql_num_rows($result);

			if($count==0)
			{
				echo "invalid details";
				header('Location: parent_dashboard.php?view_performance');
			}
			else
			{
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$student_id = $row['Student_id'];
				$sql = "SELECT * FROM Course WHERE Course_id IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') ";
		        $retval = mysql_query( $sql, $conn );
		        if(! $retval ) {
		          echo 'ward has not registered for any courses...';
		        }
		        else
		        {
		        	?>
		        	<table>
		        	<?php
		        	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
		        	{
		        		 $Courseid = $row['Course_id'];
		        		 $sql = " SELECT Grade from enrolled_in where Course_id='$Courseid' and Student_id = '$student_id' ";
		        		 $retquery = mysql_query( $sql, $conn );
		        		 $grade = mysql_fetch_array($retquery, MYSQL_ASSOC);
			         	 echo "<tr><td><strong> Course Name </strong></td><td align='center'>:</td> <td> <strong>{$row['Course_name']} </strong></td></tr>".
			         	 "<tr><td>Course_id </td><td align='center'>:</td> <td>{$row['Course_id']} </td></tr>". 
			             "<tr><td>Department </td><td align='center'>:</td> <td>{$row['Department']} </td></tr>";
			             if(is_null($grade['Grade']))
			             {
			             	echo "<tr><td colspan='3'>currently enrolled in this course</td></tr>";
			             }
			             else
			             {
			             	echo "<tr><td>Grade </td><td align='center'>:</td> <td>{$grade['Grade']} </td></tr>";
			             }
			             
			             echo "<tr><td colspan='3'>--------------------------------------------------------------------</td></tr>";
		       		 }
		       		 ?>
		       		 </table>
		       		 <?php	
		        }
		        
			}
			

		}
		?>

		</td>



<?php include("includes/student_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>
