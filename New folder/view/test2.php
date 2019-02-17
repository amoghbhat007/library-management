

 
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
                                    <th>Name</th>  
                                    <th>Address</th>  
                                    <th>Gender</th>  
                                    <th>Designation</th>  
                                    <th>Age</th> 
                                    <th> </th> 

                               </tr>  
                          </thead>  
                          <?php 
                          $result=mysqli_query($db,"SELECT * FROM library_staff");
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td><a href=# onclick= "del();">'.$row["staff_id"].'</td>  
                                    <td>'.$row["first"].'</td>  
                                    <td>'.$row["middle"].'</td>  
                                    <td>'.$row["designation"].'</td>  
                                    <td>'.$row["last"].'</td>  
                                    <td class="del"><button type="button" id="'.$row["staff_id"].'" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></button></td>
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
  if(confirm("Are you sure you want to remove "+id+"?"))
  {

    $.post('../view/delete.php' , {id:id} ,
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

