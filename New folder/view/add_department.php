<?php



include 'config.php';
$check=0;
$sql=" INSERT INTO department ( department_id, department_name, location, hod_name) VALUES 
                            ('$department_id', 'department_name', 'location', 'hod_name')";
    $result=mysqli_query($db, $sql);
    if($result)
    {
        $check=1;
    }


    if ($check==0) 
    {
    	echo "<script>upload_success_alert();</script>";	
    }
    else
    {
    	echo "<script>upload_error_alert();</script>";
    }






?>