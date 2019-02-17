<?php
include("config.php");


$subject_explode = explode('|',$_POST["subject_id"]);

$subject_id=$subject_explode[0];
$subject_name=$subject_explode[1];
$semester=$subject_explode[2];  

              
$department_id=$_POST["department_id"];
$course_id=$_POST["course_id"];
$month=$_POST["month"];
$year=$_POST["yyyy"];

$check=0;



$target_dir = "../resources/questionpapers/";
$file_name= $semester."_".$subject_id."_(".$department_id.")RC (".$course_id.")_".$subject_name."_".$month."_".$year.".pdf";


$target_file = $target_dir.$file_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    $sql=" INSERT INTO cds ( department_id, course_id, subject_id, subject_name, semester, month, year, file_path) VALUES 
                            ('$department_id', '$course_id', '$subject_id', '$subject_name', '$semester', '$month', '$year', '$file_name')";
    $result=mysqli_query($db, $sql);
    if($result)
    {
        $check=1;
    }
    else
    {
        $check=0;
    }




if (file_exists($target_file) && $check==0) 
{
    echo "not_ok";
}
else 
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
        echo "ok";
    } 
}



?>