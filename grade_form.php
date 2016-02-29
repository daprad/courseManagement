<?php

$std_id= $_GET['sid'];	
$course_id= $_GET['cid'];	
echo $_GET['sid'];
?>


<form action="submit_grade.php?sid=<?php echo $std_id.'&';?>cid=<?php echo $course_id;?> " method="post" >

	<input type="radio" name="grade" value='EX'> EX <br>
	<input type="radio" name="grade" value='A'> A <br>
	<input type="radio" name="grade" value='B'> B <br>
	<input type="radio" name="grade" value='C'> C <br>
	<input type="radio" name="grade" value='D'> D <br>
	<input type="radio" name="grade" value='P'> P <br>
	
<button type="submit" class="btn btn-success" name="grade_submit">Submit</button>	