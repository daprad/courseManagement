<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/student_dashboard_up.php"); ?>

		<td id="page">
			
			<?php	
				if(isset($_SESSION['User_id']))
				{
					$user_id = mysql_escape_string($_SESSION["User_id"]);
					$user_type = mysql_escape_string($_SESSION["User_type"]); 	
				}
				else
				{
					echo "Session variables can't be retrieved";
				}
				
				if(strcmp($user_type,"Student")==0)
				{
					$sql = "SELECT * FROM student where Student_id = '$user_id' "; 
				}
				
				$sql = "SELECT * FROM student where Student_id = '$user_id' "; 
				$result = mysql_query($sql,$conn);
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				echo "<h2> Welcome ".$row['Firstname']."</h2>";
			?>

			
			<?php
				if(isset($_GET['notify']))
				{
					$student_id = mysql_escape_string($_SESSION['User_id']);
					$sql = "SELECT * FROM course WHERE Course_id IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') ";
			        $retval = mysql_query( $sql, $conn );
			        if(! $retval ) 
			        {
			        	die('Could not get data: ' . mysql_error());
			        }
			        while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
			        {
			            echo "<b> Course_id : {$row['Course_id']} ". 
			            "Course Name :{$row['Course_name']} ".
			            "Department : {$row['Department']}  </b> <br>";
			            
			            $nestedsql = "SELECT Message,Date FROM notification WHERE Course_id = {$row['Course_id']} ORDER BY Date";
			            $nestedretval = mysql_query( $nestedsql, $conn );
				        if(! $nestedretval ) 
				        {
				        	die('Could not get data: ' . mysql_error());
				        }
				        while($nestedrow = mysql_fetch_array($nestedretval, MYSQL_ASSOC)) 
				        {
				        	echo "</br> ";
				        	echo "{$nestedrow['Date']}" . "...............". "<i> {$nestedrow['Message']} </i> <br>";
				        }
			            echo "</br> <br>";
			        }
				}
				elseif(isset($_GET['current_courses']))
				{
					 
					$student_id = mysql_escape_string($_SESSION['User_id']);
					$sql = "SELECT * FROM course WHERE Course_id IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') ";
			        $retval = mysql_query( $sql, $conn );
			        if(! $retval ) 
			        {
			        	die('Could not get data: ' . mysql_error());
			        }

			        while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
			        {
			            echo "Course_id : {$row['Course_id']} <br> ". 
			            "Course Name :{$row['Course_name']}  <br> ".
			            "Start_date : {$row['Start_date']} <br> ".
			            "Duration : {$row['Duration']} <br> ".
			            "Department : {$row['Department']} <br> ";
			             
			            echo "<a href='view_lecture.php?"."courseid=".$row['Course_id']."'"."> Lectures </a></br>";
			            echo "<a href='view_assignment.php?"."courseid=".$row['Course_id']."'"."> Assignments </a></br>";

			            $c_id = $row['Course_id'];
			            $newsql = "SELECT email_id FROM professor WHERE Professor_id IN (SELECT Professor_id FROM teaches WHERE Course_id='$c_id')";
			            $newret = mysql_query( $newsql, $conn );
			            $row1 = mysql_fetch_array($newret, MYSQL_ASSOC);

			            $prof_mail = $row1['email_id'];
			            //echo $prof_mail;
			            echo "<a href='mailto:".$prof_mail."'"."> Contact Faculty </a>";
			            echo "</br>--------------------------------<br>";
			        }
				
				}
				elseif (isset($_GET['course_catalog'])) 
				{
					?>
					<form action="" method="post">
				        <div class="form-group">
				        <label for="examplecourse">Username</label>
				        <input type="number" name="courseid" class="form-control" id="examplecourse" placeholder="courseid" required>

				        <button type="submit" class="btn btn-info" name="register">Register Course</button>

				        </div>
				    </form>
					<?php

						$student_id = mysql_escape_string($_SESSION['User_id']);

				        echo "Enter the Course_id of course to register <br><br>";

				        $sql = "SELECT * FROM course WHERE Course_id NOT IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') ";
				        mysql_select_db('coursemng');
				        $retval = mysql_query( $sql, $conn );

				        if(! $retval ) 
				        {
				        	die('Could not get data: ' . mysql_error());
				        }

				        $max_courseid= -999;

				        while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
				        {
					        $c_id = $row['Course_id'];
				            $newsql = "SELECT email_id FROM professor WHERE Professor_id IN (SELECT Professor_id FROM teaches WHERE Course_id='$c_id')";
				            $newret = mysql_query( $newsql, $conn );
				            $row1 = mysql_fetch_array($newret, MYSQL_ASSOC);

				            $prof_mail = $row1['email_id'];

					        echo "Course_id : {$row['Course_id']} <br> ". 
					        "Course Name :{$row['Course_name']}  <br> ".
					        "Start_date : {$row['Start_date']} <br> ".
					        "Duration : {$row['Duration']} <br> ".
					        "Department : {$row['Department']} <br> ".
					        "Professor E-mail ID: {$prof_mail} <br> ".
					        "--------------------------------<br>";
					        if($max_courseid < $row['Course_id'])
					        {
					     		$max_courseid = $row['Course_id'];
					        }
				        }

				        if(isset($_POST['register']))
				        {
					        $course_id = mysql_escape_string($_POST['courseid']);

					        if($course_id <= $max_courseid)
					        {
						        $sql = "INSERT INTO enrolled_in SET Course_id='$course_id', Student_id='$student_id' ";

						        $retval = mysql_query( $sql, $conn );

						        if(! $retval )
						        {
							        die('Could not enroll in course: ' . mysql_error());
						        }
						        else
							        echo "Course registered successfully";
					        }
					        else
					        {
						        echo "Enter a valid course_id <br>";
					        }

				        }
				}
				elseif(isset($_GET['perform']))
				{
					echo "perform pressed";
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
