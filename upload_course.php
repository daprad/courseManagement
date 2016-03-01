<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if(isset($_POST['btn-submit']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$c_name= $_POST['course_name'];
	$startdate= $_POST['startdate'];
	$duration= $_POST['duration'].' weeks';
	$dept= $_POST['dept'];
	$user_id = mysql_escape_string($_SESSION["User_id"]);
	

	$folder="syllabus/";  
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	$new_size = $file_size/1024;
	$final_file='syllabus_'.$c_name.'_'.$new_file_name;
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO course(Course_name, Start_date, Duration, Department, File) VALUES('$c_name','$startdate','$duration','$dept', '$final_file')";
		mysql_query($sql);	
		$sql="SELECT Course_id FROM course where Course_name='$c_name' ";
		$res=mysql_query($sql);
		$result1=mysql_fetch_array($res);
		$result1=$result1['Course_id'];

		$sql="INSERT INTO teaches(Course_id,Professor_id) VALUES('$result1','$user_id')";		
		mysql_query($sql);	

		echo "<h2> The assigned Course ID is -". "{$result1} </h2>";
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
		alert('error while uploading file');
        window.location.href='Prof_dashboard.php?fail';
        </script>
		<?php
	}
}
?>