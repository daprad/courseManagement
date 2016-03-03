<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>

<?php 
	$user_id = $_POST['user_id'];
	$user_type = $_GET['user_type'];

	if(strcmp($_GET['user_type'],"Student")==0)
	{
		//header('Location: student_dashboard.php');
		$sql = "DELETE FROM student WHERE Student_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    $sql = "DELETE FROM enrolled_in WHERE Student_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    echo "Student removed successfully";

	}
	elseif (strcmp($_GET['user_type'],"Professor")==0) 
	{
		//header('Location: Prof_dashboard.php');
		$sql = "DELETE FROM professor WHERE Professor_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    $sql = "DELETE FROM teaches WHERE Professor_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    echo "Professor removed successfully";
	}
	elseif (strcmp($_GET['user_type'],"Parent")==0) 
	{
		//header('Location: Prof_dashboard.php');
		$sql = "DELETE FROM parent WHERE Parent_id='$user_id' ";
	    $result = mysql_query($sql,$conn);
	 
	    echo "Parent removed successfully";
	}
	elseif (strcmp($_GET['user_type'],"course")==0) 
	{
		//header('Location: Prof_dashboard.php');
		$sql = "DELETE FROM course WHERE Course_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    $sql = "DELETE FROM prerequisite WHERE c_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    $sql = "DELETE FROM teaches WHERE Course_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    $sql = "DELETE FROM enrolled_in WHERE Course_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    $sql = "DELETE FROM contain_lecture WHERE Course_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    $sql = "DELETE FROM contain_assign WHERE Course_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    $sql = "DELETE FROM notification WHERE Course_id='$user_id' ";
	    $result = mysql_query($sql,$conn);

	    echo "Course removed successfully";
	}
?>
<br><br>
<h4><a href="admin_dashboard.php"> Go Back to Admin Dashboard </a></h4>
<?php include("includes/footer.php"); ?>