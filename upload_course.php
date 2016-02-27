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
	$enddate= $_POST['enddate'];
	$dept= $_POST['dept'];
	

	$folder="syllabus/";  
	
	// make file name in lower case
	$new_file_name = strtolower($c_name);
	$final_file=str_replace('syll','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO course(Course_name, Start_date, End_date, Department, File) VALUES('$c_name','$startdate','$enddate','$dept', '$final_file')";
		mysql_query($sql);
	
		$sql="SELECT Course_id FROM course where Course_name='$c_name' ";
		$res=mysql_query($sql);
		$result1=mysql_fetch_array($res);
		$result1=$result1['Course_id'];

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