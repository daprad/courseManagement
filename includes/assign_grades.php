<?php
    $user_id = mysql_escape_string($_SESSION["User_id"]);
    $sql = "SELECT * FROM professor where Professor_id = '$user_id' "; 

    $result = mysql_query($sql,$conn);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    //echo "<h2> Welcome ".$row['Firstname']."</h2>";	
    $sql= "SELECT * FROM teaches WHERE Professor_id = '$user_id' ";
    $result_set = mysql_query($sql,$conn);
?>

<form action="select_student.php" method="post" >

<?php
    
    if(mysql_num_rows($result_set)<1)
    {
        echo "<h4>You must design a course first!!!</h4><br>";
    }
    else
    {
        echo "<h4>Select course to assign grades...</h4>";
        while($row=mysql_fetch_array($result_set, MYSQL_ASSOC))
        {
            //echo 'hello'
            //echo $row['Course_id'];
            $c_id =  $row['Course_id'] ;
            $sql="SELECT Course_name FROM Course WHERE Course_id='$c_id' ";
            $res = mysql_query($sql,$conn);
            $row1 = mysql_fetch_array($res, MYSQL_ASSOC);
            $c_name = $row1['Course_name'];
            //echo $c_name;
            ?>

            <input type="radio" name="courseid" value=<?php echo $c_id; ?> > <?php echo $c_name; ?> <br>

            <?php
        } 
        ?>
        <br>
        <button type="submit" class="btn btn-success" name="course_submit">Submit</button>
        
        <?php   
    }
    
?>



