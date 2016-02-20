<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/student_dashboard_up.php"); ?>

    <td id="page">

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

        $sql = "SELECT * FROM Course WHERE Course_id NOT IN (SELECT Course_id FROM enrolled_in WHERE Student_id='$student_id') ";
        mysql_select_db('coursemng');
        $retval = mysql_query( $sql, $conn );

        if(! $retval ) {
          die('Could not get data: ' . mysql_error());
        }

        //print $retval;
        $max_courseid= -999;

        while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
          echo "Course_id : {$row['Course_id']} <br> ". 
           "Course Name :{$row['Course_name']}  <br> ".
             "Start_date : {$row['Start_date']} <br> ".
             "Duration : {$row['Duration']} <br> ".
             "Department : {$row['Department']} <br> ".
             "--------------------------------<br>";
             if($max_courseid < $row['Course_id'])
             {
              $max_courseid = $row['Course_id'];
             }
             //echo 'hello';
        }

        if(isset($_POST['register']))
        {

          echo "hello"."</br>";
          $course_id = mysql_escape_string($_POST['courseid']);
          echo $course_id."</br>";

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


        mysql_close($conn);

    ?>
    </td>
<?php include("includes/student_dashboard_down.php"); ?>

