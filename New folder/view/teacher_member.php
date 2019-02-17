


 
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
                                    <th>ID</th>  
                                    <th>Name</th>  
                                    <th>Department</th>  
                                    <th>Email</th>  
                                    <th>Phone</th>
                                    <th>Last Session</th>
                                    <th>Status</th> 
                                    

                               </tr>  
                          </thead>  
                          <?php 
                          $result=mysqli_query($db,"SELECT *

                            FROM teacher");

                          while($row = mysqli_fetch_array($result))  
                          {  
                            $result1=mysqli_query($db,"SELECT *

                            FROM teacher_email
                            WHERE teacher_id = ".$row["teacher_id"]." ");

                            $result2=mysqli_query($db,"SELECT *

                            FROM teacher_phone
                            WHERE teacher_id = ".$row["teacher_id"]." ");

                            $result3=mysqli_query($db,"SELECT *

                            FROM teacher_login

                            WHERE teacher_id = ".$row["teacher_id"]." ");

                            $row3 = mysqli_fetch_array($result3);


                            $result4=mysqli_query($db,"SELECT *

                            FROM department

                            WHERE department_id = ".$row["department_id"]." ");

                            $row4 = mysqli_fetch_array($result4);
                            

                               echo '  
                               <tr>  
                                    <td>'.$row["teacher_id"].'</td>
                                    <td>'.$row["last"].' '.$row["first"].' '.$row["middle"].'</td>  
                                    <td>'.$row4["department_name"].'</td>  
                                    <td>';
                                      while($row1 = mysqli_fetch_array($result1)) 
                                      echo $row1["email"].'</br>';
                                  '</td>';  
                                   echo '<td>';
                                      while($row2 = mysqli_fetch_array($result2)) 
                                      echo $row2["phone"].'</br>';
                                  echo '</td>  
                                    <td>'.$row3["DateTime"].'</td> 
                                    <td>'.$row3["status"].'</td> 
                                
                               </tr>  
                               ';  
                          }  
                          ?> 

                     </table>  
                </div>  
           </div>  

      





 <script>  
 $(document).ready(function(){  
      $('#table').DataTable();
 });  
 </script>

