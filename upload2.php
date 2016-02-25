
<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if(isset($_POST['btn-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$c_name= $_POST['course_name'];
	$l_name = $_POST['lec_name'];
	

	$folder="uploads2/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO lecture_file(file,Lec_name,type,size) VALUES('$final_file','$l_name','$file_type','$new_size')";
		mysql_query($sql);
		$sql="SELECT Lecture_id FROM lecture_file where file='$final_file' AND Lec_name='$l_name' ";
		$res=mysql_query($sql);
		$result=mysql_fetch_array($res);
		$result=$result['Lecture_id'];

		$sql="SELECT Course_id FROM course where Course_name='$c_name' ";
		$res=mysql_query($sql);
		$result1=mysql_fetch_array($res);
		$result1=$result1['Course_id'];

		$sql="INSERT INTO contain_lecture(Lecture_id,Course_id) VALUES('$result','$result1') ";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='upload_lec.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='upload_lec.php?fail';
        </script>
		<?php
	}
}
?>