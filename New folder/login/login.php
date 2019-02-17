<?php
	
	include("config.php");
	session_start();
   
	if($_SERVER["REQUEST_METHOD"] == "POST") 
   	{      
    	  $myusername = mysqli_real_escape_string($db,$_POST['uid']);
      	$mypassword = mysqli_real_escape_string($db,$_POST['psw']); 
      
      	$sql_1 = "SELECT student_id FROM student_login WHERE  student_id = $myusername and password = '$mypassword'";
      	$result_1 = mysqli_query($db,$sql_1);
      	$row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC);
       	$count_stu = mysqli_num_rows($result_1);
      	
      	$sql_2 = "SELECT teacher_id FROM teacher_login WHERE  teacher_id = $myusername and password = '$mypassword'";
      	$result_2 = mysqli_query($db,$sql_2);
      	$row_2 = mysqli_fetch_array($result_2,MYSQLI_ASSOC);
       	$count_tea = mysqli_num_rows($result_2);
		
       	$sql_3 = "SELECT staff_id FROM lstaff_login WHERE  staff_id = $myusername and password = '$mypassword'";
      	$result_3 = mysqli_query($db,$sql_3);
      	$row_3 = mysqli_fetch_array($result_3,MYSQLI_ASSOC);
       	$count_sta = mysqli_num_rows($result_3);

       	$sql_4 = "SELECT admin_id FROM admin_login WHERE  admin_id = $myusername and password = '$mypassword'";
      	$result_4 = mysqli_query($db,$sql_4);
      	$row_4 = mysqli_fetch_array($result_4,MYSQLI_ASSOC);
       	$count_adm = mysqli_num_rows($result_4);



     	if($count_sta == 1) 
     	{   
        $query1="UPDATE lstaff_login SET DateTime = NOW(), status='ONLINE' WHERE staff_id= ".$row_3['staff_id']."";
        mysqli_query($db,$query1);
      		$_SESSION['login_user'] = $myusername;
         	header("location: ../staff/staff.php");
     	}
  		elseif ($count_stu == 1) 
  		{
        $query2="UPDATE teacher_login SET DateTime = NOW(), status='ONLINE' WHERE teacher_id= ".$row_2['teacher_id']."";
        mysqli_query($db,$query2);
  			$_SESSION['login_user'] = $myusername;
         	header("location: ../student/student.php");
  		}
  		elseif ($count_tea == 1) 
  		{
        $query3="UPDATE student_login SET DateTime = NOW(), status='ONLINE' WHERE student_id= ".$row_1['student_id']."";
        mysqli_query($db,$query3);
    			$_SESSION['login_user'] = $myusername;
         	header("location: ../teacher/teacher.php");
  		}
  		elseif ($count_adm == 1) 
  		{ 

        $query4="UPDATE admin_login SET DateTime = NOW(), status='ONLINE' WHERE admin_id= ".$row_4['admin_id']."";
        mysqli_query($db,$query4);
  			$_SESSION['login_user'] = $myusername;
         	header("location: ../admin/admin.php");
  		}
     	else 
     	{
        	$error = "Your Login Name or Password is invalid";
          echo $error;
          header("location:index.html");
      }
   	}
?>

