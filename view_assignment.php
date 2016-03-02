<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/student_dashboard_up.php"); ?>

<style>
table, td, th {
    border: 1px solid black;
}

table {
    width: 70%;
}

</style>

<td>
    <table  align="center" >
    <tr>
    <th colspan="3">
        <?php
            $course_id = $_GET['courseid'];
            $sql = "SELECT Course_name FROM course WHERE Course_id='$course_id' ";
            $res=mysql_query($sql);
            $res=mysql_fetch_array($res);
            echo "<strong>".$res['Course_name']."</strong>";
        ?>
    </th>
    </tr>
    <tr>
    <td align="center" ><strong>File Name</strong></td>
    <td align="center" ><strong>View</strong></td>
    <td align="center" ><strong>Deadline</strong></td>
    </tr>
    <?php

	$sql="SELECT assign_file.Assign_id as Assign_id,file,deadline FROM contain_assign,assign_file where Course_id = '$course_id' and contain_assign.Assign_id=assign_file.Assign_id ";
    $result_set=mysql_query($sql);

    while($row=mysql_fetch_array($result_set))
	{
		?>
        <tr>
        <td align="center" ><?php echo $row['file'] ?></td>
        <td align="center" ><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        <td align="center" ><?php echo $row['deadline'] ?></td>
        </tr>
        <?php
	}
	?>
    </table>
    

</td>
<?php include("includes/student_dashboard_down.php"); ?>
