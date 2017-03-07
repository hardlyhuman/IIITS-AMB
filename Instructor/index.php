<?php
session_start();
error_reporting(1);
require("../config.php");
 extract($_SESSION);
 if($staff=="")
 {
 header('location:../index.php');
 }
$q=mysqli_query($con,"select * from instructor where email='".$staff."'"); 
$inst= mysqli_fetch_array($q);
 
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

    <title>Instructor Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
    <script src="../js/ie-emulation-modes-warning.js"></script>

  </head>

  <body style="background:#eee">

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#232323;border-bottom:1px solid #ccc">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:#337ab7"><?php echo "Hello  ! ".$inst['name'];?></a>
        
	
		
		</div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		
		<?php 
		if(file_exists("img/$staff"))
		{
		$arr=scandir("img/$staff");
		$img=$arr[2];
		$path="img/".$staff."/".$img;
		?>
		<li><a href="index.php?option=upload_profile_pic" style="color:#337ab7"><img style="border-radius:20px" src="<?php echo $path;?>" width="30"/></a></li>
		<?php 
		}else{
		?>
		
		
            <?php } ?>
		
			
			<li><a href="logout.php" style="color:#337ab7"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
         
        </div>
      </div>
    </nav>
    <div class="container-fluid"style="background:#eee">
      <div class="row"style="background:#eee">
        <br/>
		<div class="col-sm-3 col-md-2 sidebar"style="background:#eee">
          <ul class="nav nav-sidebar">
            <li>
			<a style="text-decoration:underline" href="index.php"style="color:#232323"><strong>Instructor Dashboard</strong> <span class="sr-only">(current)</span></a></li>
            
			<li><a href="index.php?option=Students_assigned" title="Students assigned to you"style="color:#232323"><span class="glyphicon glyphicon-user"style="color:#232323"></span> My Students</a></li>	
			
			<li><a href="index.php?option=take_attendance" title="take today's attendance "style="color:#232323"><span class="glyphicon glyphicon-list-alt"style="color:#232323"></span> Take attendances</a></li>	
			
			<li><a href="index.php?option=view_attendance" title="View all attendance "style="color:#232323"><span class="glyphicon glyphicon-list-alt"style="color:#232323"></span> View attendances</a></li>
					
		
			
	<li><a href="index.php?option=notification" title="Check notification given by admin"style="color:#232323"><span class="glyphicon glyphicon-bell" style="color:red"></span> Notification from Admin</a></li>
	
			
			
			
			<li><a href="index.php?option=update_password" title="Update Password"style="color:#232323"><span class="glyphicon glyphicon-lock"style="color:#232323"></span> Chanage Password</a></li>
			
			<li><a href="index.php?option=update_profile" title="Update Profile"style="color:#232323"><span class="glyphicon glyphicon-cog"style="color:#232323"></span> Update Profile</a></li>
			
		
			
			</li>
			
			
          </ul>
          
        </div>
		<!-- sidebar end-->
        <br/>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"style="background:#eee">
        


		
			<?php 
			$option=$_REQUEST['option'];
			if($option!="")
			{
			
				
				
				if($option=="view_attendance")
				{	
				include('view_attendance.php');
				}
				
				
				
				if($option=="view_attendance_details")
				{	
				include('view_attendance_details.php');
				}
				
					
				if($option=="take_attendance")
				{
				include('take_attendance.php');
				}
				
				
				if($option=="Students_assigned")
				{	
				include('Students_assigned.php');
				}
				
				
				if($option=="upload_course_material")
				{
				include('upload_course_material.php');
				}
			
				
				
				if($option=="update_password")
				{
				include('update_password.php');
				}
				
				if($option=="update_profile")
				{
				include('update_profile.php');
				}
				
				if($option=="upload_profile_pic")
				{
				include('upload_profile_pic.php');
				}
				
				
				if($option=="notification")
				{
				include('notification.php');
				}
				
				
			}else{
			?>
			 <h1 align="left" class="page-header" style="color:#232323">Instructor Dashboard</h1>
          <div class="row placeholders">
            <?php 
			
		
		$que=mysqli_query($con,"SELECT * from  student where course='".$inst['course']."'");
		$count=mysqli_num_rows($que);
		
			
			?>
			<h4 align="left">Total number of students assigned to you <font color="blue"> :  <?php echo $count; ?> </font>  </h4>
          </div>

          
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
<?php
session_start();
error_reporting(1);
require("../config.php");
 extract($_SESSION);
 if($staff=="")
 {
 header('location:../index.php');
 }
$q=mysqli_query($con,"select * from instructor where email='".$staff."'"); 
$inst= mysqli_fetch_array($q);
 
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

    <title>Instructor Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

  </head>

  <body style="background:#eee">

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#232323;border-bottom:1px solid #ccc">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:#337ab7"><?php echo "Hello  ! ".$inst['name'];?></a>
        
	
		
		</div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		
		<?php 
		if(file_exists("img/$staff"))
		{
		$arr=scandir("img/$staff");
		$img=$arr[2];
		$path="img/".$staff."/".$img;
		?>
		<li><a href="index.php?option=upload_profile_pic" style="color:#337ab7"><img style="border-radius:20px" src="<?php echo $path;?>" width="30"/></a></li>
		<?php 
		}else{
		?>
		
		
            <?php } ?>
		
			
			<li><a href="logout.php" style="color:#337ab7"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
         
        </div>
      </div>
    </nav>
    <div class="container-fluid"style="background:#eee">
      <div class="row"style="background:#eee">
        <br/>
		<div class="col-sm-3 col-md-2 sidebar"style="background:#eee">
          <ul class="nav nav-sidebar">
            <li>
			<a style="text-decoration:underline" href="index.php"style="color:#232323"><strong>Instructor Dashboard</strong> <span class="sr-only">(current)</span></a></li>
            
			<li><a href="index.php?option=Students_assigned" title="Students assigned to you"style="color:#232323"><span class="glyphicon glyphicon-user"style="color:#232323"></span> My Students</a></li>	
			
			<li><a href="index.php?option=take_attendance" title="take today's attendance "style="color:#232323"><span class="glyphicon glyphicon-list-alt"style="color:#232323"></span> Take attendances</a></li>	
			
			<li><a href="index.php?option=view_attendance" title="View all attendance "style="color:#232323"><span class="glyphicon glyphicon-list-alt"style="color:#232323"></span> View attendances</a></li>
					
		
			
	<li><a href="index.php?option=notification" title="Check notification given by admin"style="color:#232323"><span class="glyphicon glyphicon-bell" style="color:red"></span> Notification from Admin</a></li>
	
			
			
			
			<li><a href="index.php?option=update_password" title="Update Password"style="color:#232323"><span class="glyphicon glyphicon-lock"style="color:#232323"></span> Chanage Password</a></li>
			
			<li><a href="index.php?option=update_profile" title="Update Profile"style="color:#232323"><span class="glyphicon glyphicon-cog"style="color:#232323"></span> Update Profile</a></li>
			
		
			
			</li>
			
          </ul>
          
        </div>
		<!-- sidebar end-->
        <br/>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"style="background:#eee">
        


		
			<?php 
			$option=$_REQUEST['option'];
			if($option!="")
			{
			
				
				
				if($option=="view_attendance")
				{	
				include('view_attendance.php');
				}
				
				
				
				if($option=="view_attendance_details")
				{	
				include('view_attendance_details.php');
				}
				
					
				if($option=="take_attendance")
				{
				include('take_attendance.php');
				}
				
				
				if($option=="Students_assigned")
				{	
				include('Students_assigned.php');
				}
				
				
				if($option=="upload_course_material")
				{
				include('upload_course_material.php');
				}
			
				
				
				if($option=="update_password")
				{
				include('update_password.php');
				}
				
				if($option=="update_profile")
				{
				include('update_profile.php');
				}
				
				if($option=="upload_profile_pic")
				{
				include('upload_profile_pic.php');
				}
				
				
				if($option=="notification")
				{
				include('notification.php');
				}
				
				
			}else{
			?>
			 <h1 align="left" class="page-header" style="color:#232323">Instructor Dashboard</h1>
          <div class="row placeholders">
            <?php 
			
		
		$que=mysqli_query($con,"SELECT * from  student where course='".$inst['course']."'");
		$count=mysqli_num_rows($que);
		
			
			?>
			<h4 align="left">Total number of students assigned to you <font color="blue"> :  <?php echo $count; ?> </font>  </h4>
          </div>

          
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
