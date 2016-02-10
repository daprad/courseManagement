<!DOCTYPE html>
<html>
<head>
	<title>PHP simple login</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
    rel="stylesheet">
  

</head>
<body>

<?php


//$parts = parse_url($url);
//parse_str($parts['query'], $query);
//echo $query['id'];
$course_id = $_GET['id'];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

$sql = 'SELECT * FROM Course WHERE Course_id='.$course_id;
mysql_select_db('coursemng');
$retval = mysql_query( $sql, $conn );

if(! $retval ) {
  die('Could not get data: ' . mysql_error());
}

//print $retval;

while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
  echo "Course Name :{$row['Course_name']}  <br> ".
     "Course_id : {$row['Course_id']} <br> ".
     "Start_date : {$row['Start_date']} <br> ".
     "Duration : {$row['Duration']} <br> ".
     "Department : {$row['Department']} <br> ".
     "--------------------------------<br>";
     //echo 'hello';
}

//echo "Fetched data successfully\n";

mysql_close($conn);



?>
</body>
</html>

