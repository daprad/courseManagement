<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/student_dashboard_up.php"); ?>

<td id="page">
    <table width="80%" border="1">
    <tr>
    <th colspan="2">
        <?php
            $course_id = $_GET['courseid'];
            $sql = "SELECT Course_name FROM course WHERE Course_id='$course_id' ";
            $res=mysql_query($sql);
            $res=mysql_fetch_array($res);
            echo $res['Course_name'];
        ?>
    </th>
    </tr>
    <tr>
    <td>Lecture Name</td>
    <td>View</td>
    </tr>
    <?php

    $sql="SELECT lecture_file.Lec_id as Lec_id,file,Lec_name FROM contain_lecture,lecture_file where Course_id = '$course_id' and contain_lecture.Lec_id=lecture_file.Lec_id ";
    $result_set=mysql_query($sql);

    while($row=mysql_fetch_array($result_set))
    {
        ?>
        <tr>
        <td><?php echo $row['Lec_name'] ?></td>
        <td><a href="uploads2/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
    }
    ?>
    </table>
    

</td>
<?php include("includes/student_dashboard_down.php"); ?>