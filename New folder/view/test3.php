<?php include("config.php") ?>

              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
              <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>



<p class="statusMsg"></p>
<form enctype="multipart/form-data" id="fupForm">
     
    <br><br>
    <label for="paper_code"> PAPER NUMBER: </label>
    <select name="paper_code" id="paper_code" class="paper_code" required style="width: 50%">
      <option></option>
      <?php
          for ($i=1 ; $i<=6 ; $i++) 
          {
            echo '  
            <option value='.$i.'>'.$i.'</option>
            '; 
          }
      ?>
    </select><br><br>
    


    <label for="course_id"> COURSE:</label>
    <select name="course_id" id="course_id" class="course_id" required style="width: 50%">
      <option></option>
      <?php 
        $result=mysqli_query($db,"SELECT * FROM Course");
        while($row = mysqli_fetch_array($result))  
        {  
          echo '<option value='.$row["course_id"].'>'.$row["course_id"].'</option>';  
        }  
      ?> 
    </select><br><br>
    


    <label for="department_id"> DEPARTMENT:</label>
    <select name="department_id" id="department_id" class="department_id" style="width: 50%">
      <option></option>
      <?php 
        $result=mysqli_query($db,"SELECT * FROM department");
        while($row = mysqli_fetch_array($result))  
        {  
          echo '<option value='.$row["department_id"].'>'.$row["department_name"].'</option>';  
        }  
      ?> 
    </select><br><br>
    

    <label for="subject_id"> SUBJECT:</label>
    <select name="subject_id" id="subject_id" class="subject_id" style="width: 50%">
      <option></option>
      <?php 
        $result=mysqli_query($db,"SELECT * FROM subject");
        while($row = mysqli_fetch_array($result))  
        {  
          echo '<option value='.$row["subject_id"].'>'.$row["subject_name"].' sem('.$row["semester"].')</option>';  
        }  
      ?> 
    </select><br><br>
    
                

    <label for="month"> MONTH:</label>
    <select name="month" id="month" class="month" style="width: 50%">
      <option></option>
      <?php 
        $result=mysqli_query($db,"SELECT * FROM month");
        while($row = mysqli_fetch_array($result))  
        {  
          echo '<option value='.$row["month"].'>'.$row["month"].'</option>';  
        }  
      ?> 
    </select><br><br>
    

      <label for="yyyy"> YEAR:</label>
      <select name="yyyy" id="yyyy" class="yyyy" style="width: 10%" >
        <option></option>
        <?php  
          for ($i=2000 ; $i<=2018 ; $i++) 
          {
            echo '  
            <option value='.$i.'>'.$i.'</option>
            '; 
          }

        ?>
      </select><br><br>
    

      <label for="btn"> SELECT PDF:</label> 
      <span class="btn-default btn btn-file">Browse<input type="file"  name="fileToUpload" id="fileToUpload" required style="width: 10px"></span><br><br>
      

    <button type="submit" name="submit" class="btn btn-danger submitBtn" ><i class='fa fa-upload' style="width: 70px"></i></input></button>
</form>



<script>  
 


 $(document).ready(function(){ $('#paper_code').select2({placeholder: "Paper number" ,theme: "classic"});});
 $(document).ready(function(){ $('#course_id').select2({placeholder: "Course" ,theme: "classic"});});
 $(document).ready(function(){ $('#department_id').select2({placeholder: "Department" ,theme: "classic"});});
 $(document).ready(function(){ $('#subject_id').select2({placeholder: "Subject" ,theme: "classic"});});
 $(document).ready(function(){ $('#month').select2({placeholder: "Month" ,theme: "classic"});});
 $(document).ready(function(){ $('#yyyy').select2({placeholder: "Year" ,theme: "classic"});});



 </script>




<script>
$(document).ready(function(e)
{
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../view/upload.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(msg){
                if(msg =='ok')
                {
                    $('#fupForm').css("opacity","");
                    $(".submitBtn").removeAttr("disabled");
                    $('#fupForm')[0].reset();
                    //$('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');   
                    upload_success_alert();
                }
                else
                {
                    //$('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again</span>');
                    upload_error_alert();
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });

  $(document).ready(function(){
  $('#fileToUpload').each(function () {
        $this = jQuery(this);
        $this.on('change', function() {
            var fsize = $this[0].files[0].size,
                ftype = $this[0].files[0].type,
                fname = $this[0].files[0].name,
                fextension = fname.substring(fname.lastIndexOf('.')+1);
                validExtensions = ["pdf", "PDF"];
            
            if ($.inArray(fextension, validExtensions) == -1){
                file_type_alert();
                this.value = "";
                return false;
            }else{
                if(fsize > 3145728){/*1048576-1MB(You can change the size as you want)*/
                   alert("File size too large! Please upload less than 3MB");
                   this.value = "";
                   return false;
                }
                return true;
            }
        
        });
    });
  });

});


</script>


  
