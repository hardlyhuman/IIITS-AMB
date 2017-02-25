<?php
session_start();
error_reporting(1);
require("../config.php");
 extract($_SESSION);
 if($student=="")
 {
 header('location:../index.php');
 }
$q=mysqli_query($con,"select * from student where email='".$student."'"); 
$stu= mysqli_fetch_array($q);

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

    <title>Student Dashboard</title>

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
          <a class="navbar-brand" href="#" style="color:#337ab7"><?php echo "Hello  ! ".$stu['name'];?></a>
        
	
		
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
		
		<?php 
		}else{
		?>
		
		
            <?php } ?>
		
			
			<li><a  href="logout.php" style="color:#337ab7"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
         
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <br/>
		<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li>
			<a style="text-decoration:underline" href="index.php"style="color:#232323"><strong>Student Dashboard</strong> <span class="sr-only">(current)</span></a></li>
            
			
			
			<li><a href="index.php?option=view_attendance" title="take today's attendance "style="color:#232323"><span class="glyphicon glyphicon-list-alt"></span> View attendance</a></li>	
			
		<!--<li><a href="index.php?option=notification" title="Check notification given by admin"><span class="glyphicon glyphicon-bell" style="color:#232323"></span> Notification from Instructor</a></li>-->
	
			
			
			
			<li><a href="index.php?option=update_password" title="Update Password"style="color:#232323"><span class="glyphicon glyphicon-lock"style="color:#232323"></span> Chanage Password</a></li>
			
			<li><a href="index.php?option=update_profile" title="Update Profile"style="color:#232323"><span class="glyphicon glyphicon-cog"style="color:#232323"></span> Update Profile</a></li>
			
		

			
			</li>
			
			<!--
			<li><a href="index.php?option=inbox">Inbox</a></li>
			<li><a href="index.php?option=sent">Sent</a></li>
			-->
			
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
			 <h1 class="page-header" style="color:#232323; text-decoration:underline" align="center">Student  Dashboard</h1>
          <div class="row placeholders"style="color:#232323>
            <?php 
			
		
		$que=mysqli_query($con,"SELECT * from  attendance where stu_id='".$stu['id']."'");
		$count=mysqli_num_rows($que);
		
			
			?>
			<h4 align="left">Your total  attendance <font color="#0000FF"> :  <?php echo $count; ?> </font>  </h4>
			
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
    <!-- To make sure pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
