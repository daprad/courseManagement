<!DOCTYPE html>
<html>
<head>
	<title>PHP simple login</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
    rel="stylesheet">
  

</head>
<body>

<?php

$student_id = $_GET['id'];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

echo "Enter the Course_id of course to register <br><br>";

$sql = 'SELECT * FROM Course';
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

echo "hello";
$course_id = $_POST['courseid'];

if($course_id < $max_courseid)
{
	$sql = 'INSERT INTO enrolled_in SET Course_id='.'$course_id'.', Student_id='.'$student_id';

	$retval = mysql_query( $sql, $conn );

	if(! $retval ) {
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

<form action="" method="post">
<div class="form-group">
<label for="examplecourse">Username</label>
<input type="number" name="courseid" class="form-control" id="examplecourse" placeholder="courseid" required>

<button type="submit" class="btn btn-info" name="register">Register Course</button>

</div>
</form>



</body>
</html>