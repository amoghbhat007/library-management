<?php include("config.php") ?>

              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
              <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>



<p class="statusMsg"></p>
<form enctype="multipart/form-data" id="fupForm">

<br><br>


<label for="department_id">DEPARTMENT ID:
<input type="number" min="100" name="department_id" class="form-control" placeholder="Department ID" id="department_id" style="width: 200px" required>

<br>
<label for="department_id">DEPARTMENT NAME:
<input type="text" name="department_name" class="form-control" placeholder="Department Name" id="department_name" style="width: 400px" required>

<br>
<label for="department_id">HEAD OF THE DEPARTMENT:
<input type="text" name="hod_name" class="form-control" placeholder="HEAD OF THE DEPARTMENT" id="hod_name" style="width: 400px" required>

<br>
<label for="department_id">LOCATION:
<textarea type="text" name="hod_name" class="form-control" placeholder="LOCATION" maxlength="300" id="hod_name" style="width: 400px" required></textarea>
<br>   

     
  
      

  <div class="add_d"><button name="add_department" class="btn btn-danger submitBtn" >Add Department</button></div>
</form>





<script type="text/javascript">

$('.add_d').on('click', '.add_department', function(){
 
 
  if(confirm("Are you sure"))
  {

    $.post('../view/add_department.php' , {},
      function(data) {
        $('#insert-file').html(data);
      }

      )
  }
}
);

</script>

  









