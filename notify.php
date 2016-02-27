<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if(isset($_POST['btn-notify']))
{    
     
	$c_name= $_POST['course_name'];
	$c_id = $_POST['course_id'];
	$notification = $_POST['notification'];
	
	$sql="SELECT Course_id FROM course where Course_name='$c_name' ";
	$res=mysql_query($sql);
	$result1=mysql_fetch_array($res);
	$result1=$result1['Course_id'];

	if($result1 == $c_id && $notification != NULL){
		$sql="INSERT INTO notification(Message,Course_id) VALUES('$notification','$c_id')";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='Prof_dashboard.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while notifying');
        window.location.href='Prof_dashboard.php?fail';
        </script>
		<?php
	}
}
?>