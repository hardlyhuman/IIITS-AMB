<?php
 session_start();
error_reporting(1);
require('../config.php');
 extract($_SESSION);
 if($admin=="")
 {
 header('location:login.php');
 }
 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background:#eeeeee">

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#232323;border-bottom:1px solid #ccc">
      <div class="container-fluid" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:#337ab7"><?php echo "welcome ".$admin;?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" >
		  
		  <?php 
		if(file_exists("img/$admin"))
		{
		$arr=scandir("img/$admin");
		$img=$arr[2];
		$path="img/".$admin."/".$img;
		?>
		
		<?php 
		}else{
		?>
		
		
            <?php } ?>
		  
            <li><a href="logout.php" style="color:#337ab7"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
         
        </div>
      </div>
    </nav>

    <div class="container-fluid" >
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar"  >
            <li ><a href="index.php" style="text-decoration:underline"style="color:#232323"><strong>Admin Dashboard</strong> <span class="sr-only">(current)</span></a></li>
            <li><a href="index.php?option=category"style="color:#232323"><span class="glyphicon glyphicon-asterisk"style="color:#232323"></span> Category</a></li>
			<li><a href="index.php?option=Instructor"style="color:#232323"><span class="glyphicon glyphicon-user"style="color:#232323"></span> Instructor</a></li>
			<li><a href="index.php?option=Student"style="color:#232323"><span class="glyphicon glyphicon-user"style="color:#232323"></span> Student</a></li>
			<li><a href="index.php?option=view_attendance"style="color:#232323"><span class="glyphicon glyphicon-book"style="color:#232323"></span> View Attendance</a></li>
	
	<li><a href="index.php?option=notification"style="color:#232323"> <span class="glyphicon glyphicon-map-marker"style="color:red"></span> Notification</a></li>
        			<li><a href="index.php?option=contact"style="color:#232323"><span class="glyphicon glyphicon-phone"style="color:#232323"></span> Contact Me</a></li>
			<li><a href="index.php?option=update_password"style="color:#232323"><span class="glyphicon glyphicon-cog"style="color:#232323"></span> Update Password</a></li>
			
			
						
          </ul>
          
        </div>
		<!-- sidebar end-->
        
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         

		
			<?php 
			$option=$_REQUEST['option'];
			if($option!="")
			{
				
				if($option=="category")
				{
				include('category.php');
				}
				
				if($option=="update_category")
				{
				include('update_category.php');
				}
				
				
				if($option=="add_category")
				{
				include('add_category.php');
				}
				
				if($option=="view_attendance")
				{
				include('view_attendance.php');
				}
				if($option=="view_attendance_details")
				{
				include('view_attendance_details.php');
				}
				
				if($option=="upload_profile_pic")
				{
				include('upload_profile_pic.php');
				}
				if($option=="contact")
				{
				include('contact.php');
				}
				
				
				
				if($option=="Instructor")
				{
				include('Instructor.php');
				}
				
				if($option=="add_instructor")
				{
				include('add_instructor.php');
				}
				
				if($option=="update_password")
				{
				include('update_password.php');
				}
				
				if($option=="Student")
				{
				include('Student.php');
				}
				
				if($option=="add_student")
				{
				include('add_student.php');
				}
				
				
				if($option=="assign_instructor_student")
				{
				include('assign_instructor_student.php');
				}
				
				if($option=="notification")
				{
				include('notification.php');
				}
				if($option=="notification_add")
				{
				include('notification_add.php');
				}
				
			}else{
			?>
			
			
			<h1 class="page-header">Admin Dashboard</h1>
           <?php
		    //$que=mysql_query("select id from supervisor where email='$sup'");
$result=mysqli_query($con,"SELECT count(*) as total from student ");
$data=mysqli_fetch_assoc($result);
$countstu=$data['total'];

echo "<h3 style='color:lightblue'>Total Registered Students : <span stye='color:green'> $countstu</span></h3>";


$r=mysqli_query($con,"SELECT count(*) as total1 from instructor ");
$d=mysqli_fetch_assoc($r);
$c=$d['total1'];
echo "<h3 style='color:orange'>Total Registered Teacher :  $c</h3>";



$r=mysqli_query($con,"SELECT count(*) as total1 from instructor where status='0'");
$d=mysqli_fetch_assoc($r);
$c=$d['total1'];
echo "<h3 style='color:lightgreen'>Total Active Teacher :  $c</h3>";


$r=mysqli_query($con,"SELECT count(*) as total1 from instructor where status='1'");
$d=mysqli_fetch_assoc($r);
$c=$d['total1'];
echo "<h3 style='color:red'>Total Deactive Teacher :  $c</h3>";





		   ?>
		   
		  

         <?php }?>
		 
		   <div class="nav navbar navbar-fixed-bottom bg-success" style="background:#232323; padding-top:10px;color:#fff">
               <div class="row">
			   <div class="col-lg-1"></div>
			   <div class="col-lg-10">
			   			    	    <span><a style="color:#FFFFFF" href="http://www.donglee.biz/">Developed By Donglee</a></span>
				
                <span style="float:right;"><a href="https://www.linkedin.com/in/sriharshagajavalli" target="_blank"><img src="img/linkedin.png" width="38" height="38"></a></span>
                <span style="float:right;"><a href="https://github.com/SriHarshaGajavalli" target="_blank"><img src="img/git.png" width="38" height="38"></a></span>
                 <span style="float:right;"><a href="https://www.facebook.com/harsha.gajavalli" target="_blank"><img src="img/facebook.png" width="38" height="38"></a></span>
    </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
