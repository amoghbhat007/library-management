<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	include("../view/config.php");
	$id=$_POST['id'];
	$check=1;


 	$sql = "DELETE FROM d_has_c WHERE course_id= '".$id."'";
 	mysqli_query($db,$sql);

 	$sql = "DELETE FROM c_has_s WHERE course_id= '".$id."'";
 	mysqli_query($db,$sql); 	

 	$sql = "DELETE FROM course WHERE course_id= '".$id."'";
 	mysqli_query($db,$sql);

	$sql1 = "SELECT * FROM cds WHERE course_id = '".$id."'";
	$result1=mysqli_query($db,$sql1);
    


    

    $rowcount=mysqli_num_rows($result1);
    $i=0;


    date_default_timezone_set('Asia/Kolkata');
    $date = date('m/d/Y h:i:s a', time());
    $fileHandle=fopen("../view/data.txt",'a');
    fwrite($fileHandle, $date);

    while($row1=mysqli_fetch_array($result1))
    {

        fwrite($fileHandle, "-- ".$row1['department_id']." ".$row1['course_id']." ".$row1['subject_id']." ".$row1['subject_name']." ".$row1['semester']." ".$row1['month']." ".$row1['year']." ".$row1['file_path']."\n\r");


    	if(!unlink("../resources/questionpapers/".$row1['file_path']))
    	{
    		echo "<script>delete_error_alert();</script>";
 	    }
        else
        {
            $i++;
        }
    }

    fwrite($fileHandle, "\r\n-------------------------------------------------------------------------------------------------------------------------------------------------\r\n\r\n");
    fclose($fileHandle);


    if($i==$rowcount)
    {
    	$check=1;
    }

	//$sql = "DELETE FROM cds WHERE course_id= '".$id."'";
 	//mysqli_query($db,$sql);


 	if(mysqli_affected_rows($db) && $check==1)
 	{
  		echo "<script>delete_success_alert();</script>";
 	}
	else
	{
		echo "<script>delete_error_alert();</script>"; 
	}

}
?>

<script type="text/javascript">
$('#insert-file').ready($('#insert-file').load('../view/qpaper_delete_course.php'));
	
</script>

