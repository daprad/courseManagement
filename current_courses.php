<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/student_dashboard_up.php"); ?>

		<td id="page">
		<?php 
			$student_id = mysql_escape_string($_SESSION['User_id']);
			$sql = "SELECT * FROM Course WHERE Course_id IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') ";
	        $retval = mysql_query( $sql, $conn );
	        if(! $retval ) {
	          die('Could not get data: ' . mysql_error());
	        }

	        while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	          echo "Course_id : {$row['Course_id']} <br> ". 
	           "Course Name :{$row['Course_name']}  <br> ".
	             "Start_date : {$row['Start_date']} <br> ".
	             "Duration : {$row['Duration']} <br> ".
	             "Department : {$row['Department']} <br> ".
	             "--------------------------------<br>";
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
