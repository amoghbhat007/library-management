


 
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>


<?php include("config.php") ?>



           <div class="container" id="container" style="max-width: 100%">
                <br />  
                <div id="table-responsive" class="table-responsive" style="max-width: 100%">  


            

                     <table id="table" class="table table-striped table-bordered" style="max-width: 100%">  
                          <thead>  
                            
                               <tr>  
                                    <th>Paper code</th>  
                                    <th>Course</th>  
                                    <th>Department</th>  
                                    <th>Semester</th>  
                                    <th>Subject</th>
                                    <th>Year Month</th>
                          
                                    <th> </th> 

                               </tr>  
                          </thead>  
                          <?php 
                          $result=mysqli_query($db,"SELECT * FROM  cds ");
                          while($row = mysqli_fetch_array($result))  
                          {  
                              $file_name= $row["semester"]."_".$row["subject_id"]."_(".$row["department_id"].")RC (".$row["course_id"].")_".$row["subject_name"]."_".$row["month"]."_".$row["year"];
                                $result2=mysqli_query($db,"SELECT * FROM  department  WHERE department_id= " .$row["department_id"]);
                                $row2=mysqli_fetch_array($result2);
                               echo '  
                               <tr>  
                                    <td>'.$row["semester"].' - '.$row["subject_id"].'  RC ('.$row["course_id"].')</td>  
                                    <td>RC ('.$row["course_id"].')</td>  
                                    <td>('.$row["department_id"].') '.$row2["department_name"].'</td>  
                                    <td>'.$row["semester"].'</td>  
                                    <td>'.$row["subject_name"].'</td> 
                                    <td>'.$row["year"].' - '.$row["month"].'</td> 
                                    
                                  
                                    <td class="del"><button type="button" id="'.$file_name.'" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></button></td>
                                   
                               </tr>  
                               ';  
                          }  
                          ?> 

                     </table>  
                </div>  
           </div>  

      


<script type="text/javascript">

$('.del').on('click', '.delete', function(){
  var id = $(this).attr("id");
  if(confirm("Are you sure you want to remove: \n "+id+"?"))
  {

    $.post('../view/delete.php' , {id:id+".pdf"} ,
      function(data) {
        $('#insert-file').html(data);
      }

      )
  }
}
);

</script>




 <script>  
 $(document).ready(function(){  
      $('#table').DataTable();
 });  
 </script>

