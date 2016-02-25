<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/parent_dashboard_up.php"); ?>
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
	        	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	        	{
	        		 $Courseid = $row['Course_id'];
	        		 $sql = " SELECT Grade from enrolled_in where Course_id='$Courseid' and Student_id = '$student_id' ";
	        		 $retquery = mysql_query( $sql, $conn );
	        		 $grade = mysql_fetch_array($retquery, MYSQL_ASSOC);
		         	 echo "Course_id : {$row['Course_id']} <br> ".
		             "Course Name :{$row['Course_name']}  <br> ".
		             "Department : {$row['Department']} <br> ";
		             if(is_null($grade['Grade']))
		             {
		             	echo "currently enrolled in this course </br>";
		             }
		             else
		             {
		             	echo "Grade : {$grade['Grade']}"."</br>";
		             }
		             
		             echo "--------------------------------<br>";
	       		 }	
	        }
	        
		}
		

	}
?>
</td>

<?php include("includes/parent_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>