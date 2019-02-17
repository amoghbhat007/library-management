

 
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>




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
                                    <th>Subject</th>
                                    <th>Day</th>  
                                    <th>Month</th>  
                                    <th>Year</th> 
                                    <th> </th>

                               </tr>  
                          </thead>  



                          <td>
                              <select id="paper_code" class="paper_code" style="width: 100%">
                                <option></option>
                                <?php 
                                $result=mysqli_query($db,"SELECT * FROM question_paper");
                                while($row = mysqli_fetch_array($result))  
                                {  
                                  echo '  
                                  <option value='.$row["paper_code"].'>'.$row["paper_code"].'</option>
                                 ';  
                                }  
                                ?> 
                              </select>
                          </td>



                          <td>
                              <select id="course_id" class="course_id" style="width: 100%" >
                                <option></option>
                                <?php 
                                $result=mysqli_query($db,"SELECT * FROM course");
                                while($row = mysqli_fetch_array($result))  
                                {  
                                  echo '  
                                  <option value='.$row["course_id"].'>'.$row["course_id"].'</option>
                                 ';  
                                }  
                                ?> 
                              </select>
                          </td>

                        

                          <td>
                              <select id="department_id" class="department_id" style="width: 100%" >
                                <option></option>
                                <?php 
                                $result=mysqli_query($db,"SELECT * FROM department");
                                while($row = mysqli_fetch_array($result))  
                                {  
                                  echo '  
                                  <option value='.$row["department_id"].'>'.$row["department_name"].'</option>
                                 ';  
                                }  
                                ?> 
                              </select>
                          </td>


                          <td>
                              <select id="subject_id" class="subject_id" style="width: 100%" >
                                <option></option>
                                <?php 
                                $result=mysqli_query($db,"SELECT * FROM subject");
                                while($row = mysqli_fetch_array($result))  
                                {  
                                  echo '  
                                  <option value='.$row["subject_id"].'>'.$row["subject_name"].' ('.$row["semester"].')</option>
                                 ';  
                                }  
                                ?> 
                              </select>
                          </td>  


                          <td>
                              <select id="dd" class="dd" style="width: 100%" >
                                <option></option>
                                <?php  
                                  for ($i=1 ; $i<=31 ; $i++) 
                                  {
                                    echo '  
                                    <option value='.$i.'>'.$i.'</option>
                                    '; 
                                  }

                                ?>
                              </select>
                          </td> 


                          <td>
                              <select id="mm" class="mm" style="width: 100%" >
                                <option></option>
                                <?php  
                                  for ($i=1 ; $i<=12 ; $i++) 
                                  {
                                    echo '  
                                    <option value='.$i.'>'.$i.'</option>
                                    '; 
                                  }

                                ?>
                              </select>
                          </td>


                          <td>
                              <select id="yyyy" class="yyyy" style="width: 100%" >
                                <option></option>
                                <?php  
                                  for ($i=2000 ; $i<=2018 ; $i++) 
                                  {
                                    echo '  
                                    <option value='.$i.'>'.$i.'</option>
                                    '; 
                                  }

                                ?>
                              </select>
                          </td>

<td>


<input type="file" class="btn" id="file">
</td>

                          <td class="upload">
                            <button type="button" name="upload" class="btn btn-success upload"><i class='fa fa-upload'></i></button>
                          </td>


                     </table>  
                </div>  
           </div>  


      


 <script>  
 $(document).ready(function(){  
      $('#table').DataTable();
 });  


 $(document).ready(function(){ $('#paper_code').select2({placeholder: "Paper code" ,theme: "classic"});});
 $(document).ready(function(){ $('#course_id').select2({placeholder: "Course" ,theme: "classic"});});
 $(document).ready(function(){ $('#department_id').select2({placeholder: "Department" ,theme: "classic"});});
 $(document).ready(function(){ $('#subject_id').select2({placeholder: "Subject" ,theme: "classic"});});
 $(document).ready(function(){ $('#dd').select2({placeholder: "Day" ,theme: "classic"});});
 $(document).ready(function(){ $('#mm').select2({placeholder: "Month" ,theme: "classic"});});
 $(document).ready(function(){ $('#yyyy').select2({placeholder: "Year" ,theme: "classic"});});



 </script>


<script type="text/javascript">




$('.upload').on('click', '.upload', function(){

  var paper_code =document.getElementById("paper_code").value;
  var course_id =document.getElementById("course_id").value;
  var department_id =document.getElementById("department_id").value;
  var subject_id =document.getElementById("subject_id").value;
  var dd =document.getElementById("dd").value;
  var mm =document.getElementById("mm").value;
  var yyyy =document.getElementById("yyyy").value;
  var file =document.getElementById("file").value;

  if(confirm("Upload?"))
  {

    $.post('../view/upload.php' , {paper_code:paper_code , course_id:course_id, department_id:department_id, subject_id:subject_id, dd:dd, mm:mm, yyyy:yyyy} ,
      function(data) {
        $('#insert-file').html(data);
      }

      )
  }
}
);

</script>