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
			header('Location: view_performance.php');
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
		         	 echo "Course_id : {$row['Course_id']} <br> ". 
		             "Course Name :{$row['Course_name']}  <br> ".
		             "Start_date : {$row['Start_date']} <br> ".
		             "Duration : {$row['Duration']} <br> ".
		             "Department : {$row['Department']} <br> ".
	             	 "--------------------------------<br>";
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