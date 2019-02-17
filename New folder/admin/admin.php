<!DOCTYPE html>
<html>
<head>

    <?php
      session_start();  
      $var_value = $_SESSION['login_user'];

      if(!$_SESSION['login_user']){header("location:../login/index.html");}  
    ?>

  <title>Library Management System | </title>
  <!--script type="text/javascript">alert("Logged in Successfully!") </script-->


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>



  <link rel="stylesheet" href="AdminLTE.min.css">
  <link rel="stylesheet" href="skin-red.css">
  <link rel="stylesheet" href="style.css">
  <script src="AdminLTE.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.min.css" rel="stylesheet">
  <script type="text/javascript" src="script.js"></script>


</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <a href=# class="logo">
      <span class="logo-mini"><i class="fas fa-book-reader"></i></span> 
      <span class="logo-lg"><i class="fas fa-book-reader logo1"></i><b>Library</b></span>
    </a>
 
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  
</div>

  </header>



  <aside class="main-sidebar">


    <section class="sidebar"><br>

      <div class="user-panel">
        <div class="pull-left image">
          <img src="admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <strong><a href="#" class="text-success"></a></strong>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      

      <ul class="sidebar-menu" data-widget="tree">
        <li class="active"><a class="header"><span>ADMIN ID <?php echo $var_value ?></span></a></li>
        
        
        <li ><a href=# onclick='dashboard();'><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


        <li class="treeview">
          <a href="#"><i class='fa fa-users'></i> <span>Members</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="#" onclick="admin_member()"><i class='fa fa-user'></i> <span>Admin</span></a></li>  
            <li><a href="#" onclick="staff_member()"><i class='fa fa-user'></i> <span>Library staff</span></a></li>
            <li><a href="#" onclick="teacher_member()"><i class='fa fa-user'></i> <span>Teachers</span></a></li>
            <li><a href="#" onclick="student_member()"><i class='fa fa-user'></i> <span>Students</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class='fa fa-book'></i> <span>Books</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="#" onclick="book_download()"><i class='fa fa-download'></i> <span>Download</span></a></li>  
            <li><a href="#" onclick="book_upload()"><i class='fa fa-upload'></i> <span>Upload</span></a></li>
            <li><a href="#" onclick="book_delete()"><i class='fa fa-trash-o'></i> <span>Delete</span></a></li>
            <li><a href="#" onclick="book_delete_course()"><i class='fa fa-trash'></i> <span>Delete by course</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class='fa fa-file-o'></i> <span>Question papers</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="#" onclick="qpaper_download()"><i class='fa fa-download'></i> <span>Download</span></a></li>  
            <li><a href="#" onclick="qpaper_upload()"><i class='fa fa-upload'></i> <span>Upload</span></a></li>
            <li><a href="#" onclick="qpaper_delete()"><i class='fa fa-trash-o'></i> <span>Delete</span></a></li>
            <li><a href="#" onclick="qpaper_delete_course()"><i class='fa fa-trash'></i> <span>Delete by course</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class='fa fa-file-word-o'></i> <span>Magazines</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="#" onclick="magazine_upload()"><i class='fa fa-download'></i> <span>Download</span></a></li>  
            <li><a href="#" onclick="magazine_download()"><i class='fa fa-upload'></i> <span>Upload</span></a></li>
            <li><a href="#" onclick="magazine_delete()"><i class='fa fa-trash-o'></i> <span>Delete</span></a></li>
            <li><a href="#" onclick="magazine_delete_month()"><i class='fa fa-trash'></i> <span>Delete by month</span></a></li>
          </ul>
        </li>

          <li class="treeview">
          <a href="#"><i class='fa fa-newspaper-o'></i> <span>Newspapers</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="#" onclick="npaper_download()"><i class='fa fa-download'></i> <span>Download</span></a></li>  
            <li><a href="#" onclick="npaper_upload()"><i class='fa fa-upload'></i> <span>Upload</span></a></li>
            <li><a href="#" onclick="npaper_delete()"><i class='fa fa-trash-o'></i> <span>Delete</span></a></li>
            <li><a href="#" onclick="npaper_delete_month()"><i class='fa fa-trash'></i> <span>Delete by month</span></a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#"><i class='fa fa-plus'></i> <span>Add</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="#" onclick="new_department()"><i class='fa fa-plus-square-o'></i> <span>New Department</span></a></li>  
            <li><a href="#" onclick="new_course()"><i class='fa fa-plus-square-o'></i> <span>New Course</span></a></li>
            <li><a href="#" onclick="new_subject()"><i class='fa fa-plus-square-o'></i> <span>New Subject</span></a></li>
            <li><a href="#" onclick="course_department()"><i class='fa fa-plus-square-o'></i> <span>Course to Departemnt</span></a></li>
            <li><a href="#" onclick="subject_course()"><i class='fa fa-plus-square-o'></i> <span>Subject to Course</span></a></li>
          </ul>
        </li>        



          <li class="treeview">
          <a href="#"><i class='fa fa-cogs'></i> <span>Actions</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="#" onclick="log_out_alert()"><i class='fa fa-sign-out '></i> <span>Log out</span></a></li>  
            <li><a href="#"><i class='fa fa-info-circle'></i> <span>About us!</span></a></li>
          </ul>
        </li>       

      </ul>
      
    </section>
  </aside>


  <div class="content-wrapper"><br>
    <section class="content-header">
          <h1>
            Library Management
            <small>Control panel</small>
          </h1>

          <ol class="breadcrumb">
            <li><a href="#"><i id="icon" class="fa fa-dashboard"></i>Admin</a></li>
            <li id="tab" class="active">dashboard</li>
          </ol>

          <br>
          <br>

  <script src="AdminLTE.min.js"></script>


      <div id="insert-file">
        
      </div>  


    </section>


  </div>




<!----------------------------------------------------------------------------------alerts-------------------------------------------------------------------------->


        
  <div class="alert-fixed">
  </div>



<script type="text/javascript">

function log_in_alert() 
{
  $('body').css("opacity",".9");
      
  $('.alert-fixed').append("<div id='log_in_alert' class='alert alert alert-info alert-dismissable fade in out' data-keyboard='false' data-backdrop='static'><a href=# class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4 class='alert-heading' >Yay!<i class='fa fa-circle-o-notch fa-spin'></i></h4>Successfully logged in!</div>")


  $('#log_in_alert').on('closed.bs.alert', function () {
                $('body').css("opacity","");
              })

}



function log_out_alert() 
{
      
  $('.alert-fixed').append("<div id='log_out_alert' class='alert alert-success alert-dismissable fade in out'><a href=# class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4 class='alert-heading'>Bye!<i class='fa fa-circle-o-notch fa-spin '></i></h4>Successfully logged out!</div>")


  $('#log_out_alert').on('closed.bs.alert', function () {
               self.location='../login/logout.php';
              })

}


function upload_success_alert() 
{
  $('body').css("opacity",".9");
      
  $('.alert-fixed').append("<div id='upload_success_alert' class='alert alert alert-info alert-dismissable fade in out' data-keyboard='false' data-backdrop='static'><a href=# class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4 class='alert-heading'>Yay!<i class='fa fa-circle-o-notch fa-spin '></i></h4>Uploaded successfully!</div>")


  $('#upload_success_alert').on('closed.bs.alert', function () {
                $('body').css("opacity","");
                window.history.replaceState(null, null, window.location.pathname);
              })

}

function upload_error_alert() 
{
  $('body').css("opacity",".9");
      
  $('.alert-fixed').append("<div id='upload_error_alert' class='alert alert-danger alert-dismissable fade in out' data-keyboard='false' data-backdrop='static'><a href=# class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4 class='alert-heading'>Oops!<i class='fa fa-circle-o-notch fa-spin '></i></h4>Some problem occurred, please try again!</div>")


  $('#upload_error_alert').on('closed.bs.alert', function () {
                $('body').css("opacity","");
                window.history.replaceState(null, null, window.location.pathname);
              })

}

function file_type_alert() 
{
  $('body').css("opacity",".9");
      
  $('.alert-fixed').append("<div id='file_type_alert' class='alert alert-warning alert-dismissable fade in out' data-keyboard='false' data-backdrop='static'><a href=# class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4 class='alert-heading'>Alert!<i class='fa fa-circle-o-notch fa-spin '></i></h4>Chooses a proper file type (PDF)!</div>")


  $('#file_type_alert').on('closed.bs.alert', function () {
                $('body').css("opacity","");
                window.history.replaceState(null, null, window.location.pathname);
              })

}


function delete_success_alert() 
{
  $('body').css("opacity",".9");
      
  $('.alert-fixed').append("<div id='delete_success_alert' class='alert alert alert-info alert-dismissable fade in out' data-keyboard='false' data-backdrop='static'><a href=# class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4 class='alert-heading'>Yay!<i class='fa fa-circle-o-notch fa-spin '></i></h4>Deleted successfully!</div>")


  $('#delete_success_alert').on('closed.bs.alert', function () {
                $('body').css("opacity","");
              })

}


function delete_error_alert() 
{
  $('body').css("opacity",".9");
      
  $('.alert-fixed').append("<div id='delete_error_alert' class='alert alert-danger alert-dismissable fade in out' data-keyboard='false' data-backdrop='static'><a href=# class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4 class='alert-heading'>Oops!<i class='fa fa-circle-o-notch fa-spin '></i></h4>Some problem occurred while deleting, please try again!</div>")


  $('#delete_error_alert').on('closed.bs.alert', function () {
                $('body').css("opacity","");
              })

}



$('body').css("opacity",".9");
setTimeout( log_in_alert , 400);






</script>




</script>









<!----------------------------------------------------------------------------------alerts-------------------------------------------------------------------------->


</body>
</html>

 



<script type="text/javascript">
  history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>


