<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/student_dashboard_up.php"); ?>

		<td id="page" >
			
			<?php	
				if(isset($_SESSION['User_id']))
				{
					$user_id = mysql_escape_string($_SESSION["User_id"]);
					$user_type = mysql_escape_string($_SESSION["User_type"]); 	
				}
				else
				{
					//echo "Session variables can't be retrieved";
					header('Location: login.php');
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
					$count = mysql_num_rows($retval);
					if($count<1) 
					{
						//die('Could not get data: ' . mysql_error());
						echo "<strong> Not registered in any course...</strong>";
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
			       	$num_count = mysql_num_rows($retval);

			        if($num_count<1) 
			        {
			        	echo "<h4>You are not enrolled in any course</h4>";
			        }
				    else
			        {
			        	echo "<h4> You are presently enrolled in the following courses....</h4>";
			        }

			        ?>
			        <table >

			        <?php
			        while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
			        {
			            echo "<tr><td><strong> Course Name </strong></td><td align='center'>:</td> <td> <strong>{$row['Course_name']} </strong></td></tr>". 
			            "<tr><td>Course_id </td><td align='center'>:</td> <td>{$row['Course_id']} </td></tr>". 
			            "<tr><td>Start_date </td><td align='center'>:</td> <td>{$row['Start_date']} </td></tr>".
			            "<tr><td>Duration </td><td align='center'>:</td> <td>{$row['Duration']} </td></tr>".
			            "<tr><td>Department </td><td align='center'>:</td> <td>{$row['Department']} </td></tr>";
			            ?>

			            <tr>
			            <td width="100" >
			            
			            <?php
			            echo "<a href='view_syllabus.php?"."courseid=".$row['Course_id']."'"."> Syllabus </a></br>";
			            ?>

			            </td>
			            <td width="120">

			            <?php
			            echo "<a href='view_lecture.php?"."courseid=".$row['Course_id']."'"."> Lectures </a>";
			            ?>

			            </td>
			            <td width="120">

			            <?php
			            echo "<a href='view_assignment.php?"."courseid=".$row['Course_id']."'"."> Assignments </a>";
			            ?>

			            </td>
			            <td width="150">
			            
			            <?php
			            $c_id = $row['Course_id'];
			            $newsql = "SELECT email_id FROM professor WHERE Professor_id IN (SELECT Professor_id FROM teaches WHERE Course_id='$c_id')";
			            $newret = mysql_query( $newsql, $conn );
			            $row1 = mysql_fetch_array($newret, MYSQL_ASSOC);
			            $prof_mail = $row1['email_id'];
			            //echo $prof_mail;
			            echo "<a href='mailto:".$prof_mail."'"."> Contact Faculty </a>";
			            ?>

			            </td>			            
			            </tr>

			            <?php
			            echo "<tr><td colspan='4'>----------------------------------------------------------------------------------------------------</td></tr>";
			        }
			        ?>
			        </table>
			        <?php

				}
				elseif (isset($_GET['course_catalog'])) 
				{
					?>
					<form action="" method="post">
				        <div class="form-group">
				        <label for="examplecourse">Enter Course Id to register</label>
				        <input type="number" name="courseid" class="form-control" id="examplecourse" placeholder="courseid" required>

						<button type="submit" class="btn btn-info" name="register">Register Course</button>

						</div>
					</form>
					<?php

						$student_id = mysql_escape_string($_SESSION['User_id']);

				        //echo "Enter the Course_id of course to register <br><br>";

				        $sql = "SELECT * FROM course WHERE Course_id NOT IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') and Start_date<CURDATE() ";
				        mysql_select_db('coursemng');
				        $retval = mysql_query( $sql, $conn );
				        $num_count = mysql_num_rows($retval);

				        if($num_count<1) 
				        {
				        	//die('Could not get data: ' . mysql_error());
				        	echo "<h4>No Courses to Register</h4>";
				        }
				        else
				        {
				        	echo "<h4>These are the Courses you can register in...</h4>";	
				        }

				        $max_courseid= -999;
					?>
			        
			        <table >

			        <?php
				        while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
				        {
					        $c_id = $row['Course_id'];
				            $newsql = "SELECT email_id FROM professor WHERE Professor_id IN (SELECT Professor_id FROM teaches WHERE Course_id='$c_id')";
				            $newret = mysql_query( $newsql, $conn );
				            $row1 = mysql_fetch_array($newret, MYSQL_ASSOC);

				            $query1 = "SELECT * FROM course WHERE Course_id IN (SELECT pre_id FROM prerequisite WHERE c_id = '$c_id') "; 
				            $result1 = mysql_query( $query1, $conn );

				            $prof_mail = $row1['email_id'];

					        echo "<tr><td><strong> Course Name </strong></td><td align='center'>:</td> <td> <strong>{$row['Course_name']} </strong></td></tr>".
					        "<tr><td>Course_id </td><td align='center'>:</td> <td>{$row['Course_id']} </td></tr>". 
			            	"<tr><td>Start_date </td><td align='center'>:</td> <td>{$row['Start_date']} </td></tr>".
					        "<tr><td>Duration </td><td align='center'>:</td> <td>{$row['Duration']} </td></tr>".
			            	"<tr><td>Department </td><td align='center'>:</td> <td>{$row['Department']} </td></tr>".
					        "<tr><td>Professor E-mail ID </td><td align='center'>:</td> <td> {$prof_mail} </td></tr> ";

					        echo "<tr><td>Syllabus</td><td align='center'>:</td><td><a href='view_syllabus.php?courseid=".$row['Course_id']."'"."> Click here </a></td></tr>";
					        echo "<tr><td>Prerequisites </td><td align='center'>:</td>";
					        echo "<td>";
					        
					        if($result1 === FALSE) 
					        { 
							    die(mysql_error()); // TODO: better error handling
							}
					        
					        while($my_row1 = mysql_fetch_array($result1, MYSQL_ASSOC))
					        {	
					        	echo $my_row1['Course_name'].", ";
					        }
					        echo "</td></tr>"; 
					        echo "<tr><td colspan='3'>--------------------------------------------------------------------</td></tr>";
					        
					        if($max_courseid < $row['Course_id'])
					        {
					     		$max_courseid = $row['Course_id'];
					        }
				        }
					?>
				    </table>
					<?php

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
				elseif (isset($_GET['upcoming_courses'])) 
				{
					//echo "upcoming pressed";
					$student_id = mysql_escape_string($_SESSION['User_id']);

			        $sql = "SELECT * FROM course WHERE Start_date>CURDATE() ";
			        mysql_select_db('coursemng');
			        $retval = mysql_query( $sql, $conn );
			        $num_count = mysql_num_rows($retval);

			        if($num_count<1) 
			        {
			        	//die('Could not get data: ' . mysql_error());
			        	echo "<h4>No Upcoming Courses</h4>";
			        }
			        else
			        {
			        	echo "<h4>These are the Upcoming Courses...</h4>";	
			        }

			        $max_courseid= -999;
			        ?>
			        
			        <table >

			        <?php
				        while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
				        {
					        $c_id = $row['Course_id'];
				            $newsql = "SELECT email_id FROM professor WHERE Professor_id IN (SELECT Professor_id FROM teaches WHERE Course_id='$c_id')";
				            $newret = mysql_query( $newsql, $conn );
				            $row1 = mysql_fetch_array($newret, MYSQL_ASSOC);

				            $query1 = "SELECT * FROM course WHERE Course_id IN (SELECT pre_id FROM prerequisite WHERE c_id = '$c_id') "; 
							$result1 = mysql_query( $query1, $conn );

				            $prof_mail = $row1['email_id'];

					        echo "<tr><td><strong> Course Name </strong></td><td align='center'>:</td> <td> <strong>{$row['Course_name']} </strong></td></tr>".
					        "<tr><td>Course_id </td><td align='center'>:</td> <td>{$row['Course_id']} </td></tr>". 
			            	"<tr><td>Start_date </td><td align='center'>:</td> <td>{$row['Start_date']} </td></tr>".
					        "<tr><td>Duration </td><td align='center'>:</td> <td>{$row['Duration']} </td></tr>".
			            	"<tr><td>Department </td><td align='center'>:</td> <td>{$row['Department']} </td></tr>".
					        "<tr><td>Professor E-mail ID </td><td align='center'>:</td> <td> {$prof_mail} </td></tr> ";
					        echo "<tr><td>Syllabus</td><td align='center'>:</td><td><a href='view_syllabus.php?courseid=".$row['Course_id']."'"."> Click here </a></td></tr>";
					        echo "<tr><td>Prerequisites </td><td align='center'>:</td>";
					        echo "<td>";
					        
					        if($result1 === FALSE) 
					        { 
							    die(mysql_error()); // TODO: better error handling
							}
					        
					        while($my_row1 = mysql_fetch_array($result1, MYSQL_ASSOC))
					        {	
					        	echo $my_row1['Course_name'].", ";
					        }
					        echo "</td></tr>"; 
					        echo "<tr><td colspan='3'>--------------------------------------------------------------------</td></tr>";
					        
					        if($max_courseid < $row['Course_id'])
					        {
					     		$max_courseid = $row['Course_id'];
					        }
				        }
					?>
				    </table>
					<?php
				}
				elseif(isset($_GET['payment_status']))
				{
					 
					$student_id = mysql_escape_string($_SESSION['User_id']);
					$sql = "SELECT * FROM course WHERE Course_id IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') ";
					$retval = mysql_query( $sql, $conn );
					$count = mysql_num_rows($retval);
					if($count<1 ) 
					{
						//die('Could not get data: ' . mysql_error());
						echo "<strong>No Courses registered...</strong>";
					}

					?>
					<table >
					<?php
					while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
					{
						echo "<tr><td><strong> Course Name </strong></td><td align='center'>:</td> <td> <strong>{$row['Course_name']} </strong></td></tr> ".
						"<tr><td>Course_id </td><td align='center'>:</td> <td>  {$row['Course_id']} </td></tr> ";
						

						$c_id = $row['Course_id'];
						$paymentsql = "SELECT Payment_status FROM enrolled_in WHERE Student_id= '$student_id' AND Course_id='$c_id'";
						$paymentret = mysql_query( $paymentsql, $conn );
						$paymentrow = mysql_fetch_array($paymentret, MYSQL_ASSOC);
						if($paymentrow['Payment_status'] == 'Yes')
							echo "<tr><td>Payment Status </td><td align='center'>:</td> <td> Yes </td></tr>";
						else
							echo "<tr><td>Payment Status </td><td align='center'>:</td> <td> No </td></tr>";

						$newsql = "SELECT email_id FROM professor WHERE Professor_id IN (SELECT Professor_id FROM teaches WHERE Course_id='$c_id')";
						$newret = mysql_query( $newsql, $conn );
						$row1 = mysql_fetch_array($newret, MYSQL_ASSOC);

						$prof_mail = $row1['email_id'];
						//echo $prof_mail;
						echo "<tr><td>E-mail</td><td align='center'>:</td> <td><a href='mailto:".$prof_mail."'"."> Contact Faculty </a></td></tr>";
						echo "<tr><td colspan='3'>--------------------------------------------------------------------</td></tr>";
					}
					?>
					</table>
					<?php
				}
				elseif(isset($_GET['perform']))
				{
					//echo "perform pressed";

					$student_id = mysql_escape_string($_SESSION['User_id']);

					$sql = "SELECT * FROM Course WHERE Course_id IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') ";
			        $retval = mysql_query( $sql, $conn );
			        $count = mysql_num_rows($retval);
			        if($count<1 ) 
			        {
			          echo '<strong>You have not registered for any course yet...</strong>';
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
			?>
			
			
		</td>
<?php include("includes/student_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>
