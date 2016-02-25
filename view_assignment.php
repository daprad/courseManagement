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
    <td>File Name</td>
    <td>View</td>
    <td>Deadline</td>
    </tr>
    <?php

	$sql="SELECT assign_file.Assign_id as Assign_id,file,deadline FROM contain_assign,assign_file where Course_id = '$course_id' and contain_assign.Assign_id=assign_file.Assign_id ";
    $result_set=mysql_query($sql);

    while($row=mysql_fetch_array($result_set))
	{
		?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        <td><?php echo $row['deadline'] ?></td>
        </tr>
        <?php
	}
	?>
    </table>
    

</td>
<?php include("includes/student_dashboard_down.php"); ?>
