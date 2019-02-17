


 
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
                                    <th>Date</th> 
                                    <th> </th> 

                               </tr>  
                          </thead>  
                          <?php 
                          $result=mysqli_query($db,"SELECT *

                            FROM qp_has_cds, subject, question_paper, department 
                            WHERE qp_has_cds.paper_code = question_paper.paper_code AND 
                                  qp_has_cds.subject_id = subject.subject_id AND 
                                  qp_has_cds.department_id = department.department_id 

                            ");
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["paper_code"].'</td>  
                                    <td>'.$row["course_id"].'</td>  
                                    <td>'.$row["department_name"].'</td>  
                                    <td>'.$row["semester"].'</td>  
                                    <td>'.$row["subject_name"].'</td> 
                                    <td>'.$row["yyyy"].' - '.$row["month"].'</td> 
                                    <td class="download">
                                        <button type="button" name="add" id=
                                            "'.$row["course_id"]."-".$row["paper_code"]."-".$row["subject_name"]."-".$row["department_name"]."-".$row["semester"]."-".$row["month"].'" class="btn btn-info"><i class="fa fa-download"></i>
                                            </button>
                                    </td>
                               </tr>  
                               ';  
                          }  
                          ?> 

                     </table>  
                </div>  
           </div>  

      


<script type="text/javascript">

$('.download').on('click', '.btn', function(){
  
var id = $(this).attr("id");

    var win = window.open("../resources/questionpapers/"+id+".pdf", '_blank');
    win.focus();

  }
);

</script>




 <script>  
 $(document).ready(function(){  
      $('#table').DataTable();
 });  
 </script>

