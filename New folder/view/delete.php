<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	include("../view/config.php");
	$id=$_POST['id'];
$check=0;
 	

 	$sql = "DELETE FROM cds WHERE file_path= '".$id."'";
 	$result=mysqli_query($db,$sql);

	
	if (!unlink("../resources/questionpapers/".$id))
  	{
  		$check=0;
  	}
	else
 	{
  		$check=1;
  	}


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
$('#insert-file').ready($('#insert-file').load('../view/qpaper_delete.php'));
	
</script>

