


 
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
                                    <th>Designation</th>  
                                    <th>Email</th>  
                                    <th>Phone</th>
                                    <th>Last Session</th>
                                    <th>Status</th> 
                                    

                               </tr>  
                          </thead>  
                          <?php 
                          $result=mysqli_query($db,"SELECT *

                            FROM library_staff
                            WHERE designation = 'ADMIN' ");

                          while($row = mysqli_fetch_array($result))  
                          {  
                            $result1=mysqli_query($db,"SELECT *

                            FROM lstaff_email
                            WHERE staff_id = ".$row["staff_id"]." ");

                            $result2=mysqli_query($db,"SELECT *

                            FROM lstaff_phone
                            WHERE staff_id = ".$row["staff_id"]." ");

                            $result3=mysqli_query($db,"SELECT *

                            FROM admin_login
                            WHERE admin_id = ".$row["staff_id"]." ");

                            $row3 = mysqli_fetch_array($result3);
                            

                               echo '  
                               <tr>  
                                    <td>'.$row["staff_id"].'</td>
                                    <td>'.$row["last"].' '.$row["first"].' '.$row["middle"].'</td>  
                                    <td>'.$row["designation"].'</td>  
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

