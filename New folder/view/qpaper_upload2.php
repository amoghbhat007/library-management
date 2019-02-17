<?php

include 'config.php';

if(!empty($_POST["department_id"]))
{

    $sql="SELECT course_id FROM d_has_c WHERE department_id = ".$_POST['department_id'];
    $result=mysqli_query($db,$sql);    
    $rowcount=mysqli_num_rows($result);     
    


    if($rowcount > 0)
    {

        echo "<option></option>";
        while($row = mysqli_fetch_array($result))  
        {  
            echo '<option value ='.$row["course_id"].'>RC '.$row["course_id"].'</option>';   
        }  
    }
    else
    {
        echo '<option value="">Course not available</option>';
    }


}


elseif(!empty($_POST["course_id"]))
{
    

    $sql="SELECT * FROM c_has_s WHERE   course_id = '".$_POST['course_id']."'";
    $result=mysqli_query($db,$sql);
    $rowcount=mysqli_num_rows($result);
    
    
    if($rowcount > 0)
    {
        echo '<option></option>';
        while($row = mysqli_fetch_array($result))  
        {  
            echo '<option value ="'.$row["subject_id"].'|'.$row["subject_name"].'|'.$row["semester"].'">'.$row["subject_id"].'-'.$row["subject_name"].' Sem('.$row["semester"].')</option>';
             
        }  
    }
    else{
        echo '<option value="">Subject not available</option>';
    }
}


?>