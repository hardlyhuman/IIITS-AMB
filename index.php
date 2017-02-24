<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<style>
		body {
  padding-top: 200px;
  padding-bottom: 200px;
  background-color:#eee
}

.theme-dropdown .dropdown-menu {
  position: static;
  display: block;
  margin-bottom: 20px;
}

.theme-showcase > p > .btn {
  margin: 5px 0;
}

.theme-showcase .navbar .container {
  width: auto;
}
	</style>
	



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>IIITS Attendance portal</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

   

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">

    </style>
</head>

  <body role="document" class="doc" style="background:#eee">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#232323">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
        <a class="navbar-brand" href="index.php" style="color:#fff">IIITS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php"style="color:#fff" ><span class="glyphicon glyphicon-home">Home</span></a></li>
         
			
			<li><a href="index.php?option=about" style="color:#fff" ><span class="glyphicon glyphicon-book">About Me</span></a></li>
            <li><a href="index.php?option=contact" style="color:#fff"><span class="glyphicon glyphicon-envelope">Contact Me</span></a></li>
            
          </ul>
		   <ul class="nav navbar-nav navbar-right">
                        
					<li>
			<a href="#" data-toggle="modal" data-target="#log"style="color:#fff" >
			<span class="glyphicon glyphicon-lock"></span>LogIn</a>
		</li>    
			
	<li>
			<a  href="#" data-toggle="modal" data-target="#m" style="color:#fff">
			<span class="glyphicon glyphicon-pencil"></span>Register</a>
		</li>
			
						
        <!--nav-collapse -->
      
    

<div class="row"style="background:#eee">
<div class="col-lg-12"style="background:#eee">
    <div class="container theme-showcase" role="main"style="background:#eee">

      <!-- Main jumbotron for a primary marketing message or call to action -->
	  <?php 
	  @$opt=$_REQUEST['option'];
	  if($opt!="")
	  {
		if($opt=="newuser")
		{
		include('regis.php');
		}
		if($opt=="login")
		{
		include('login.php');
		}
		if($opt=="about")
		{
		include('about.php');
		}
		if($opt=="contact")
		{
		include('contact.php');
		}
		if($opt=="forget_password")
		{
		include('forget_password.php');
		}
	  }else{
	  ?>

	

    
    
    
 
<div class="row" style="background:#eee">
  <div class="col-sm-1">  
  
  </div>
   <div class="col-sm-10"style="background:#eee">   
 <h2 align="center" class="style1">Holaa! I'm Your attendance management bot </h2>

	 <p><strong><em> Dear user,</em></strong></p>     
I am your attendance manager. I will help you in many ways related to attendance. You can see your attendance according to the courses you attend. 
Still expecting something else from me? Then proceed for further texts<br/>

Attendance Reporting You'll Love!
You will have a variety of reports at your fingertips. You can view and print in depth reports by student or class and export them to Excel or download and share via PDF.
<br/>
All further ideas and extensions are welcome!! <br/>
Please submit your feedback in contact me page<br/>
Thank you!!!
     </div>
	</div>
	
	
  </div>
  
</div>
	 
	  
	   
	  
<?php }?>


<br / > <br />    
      <div class="row">
    

	
      </div>
    </div> <!-- /container -->
	

	

	
	
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
	
	


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- registration model start -->

<?php include("login_p.php");?>
 
   		<?php  include('registration.php'); ?>

     <script src="jquery-1.11.2.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
	
	<script>
	
	$(document).ready(function(){
					$("#err1").hide();
			$("#save").click(function(){
		
					var username =$('#username').val();
					var email =$('#email12').val();
					var pass =$('#pass123').val();
					var mob =$('#mob').val();
					var gen =$('#gender').val();
					var prog =$('#program').val();
					var course =$('#course').val();
                    var usertype =$('#usertype').val();
//	alert(mob);
var dataString = 'username='+ username + '&email='+ email+'&pass='+pass+'&mobile='+mob+'&gen='+gen+'&prog='+prog+'&course='+course+'&usertype='+usertype ;
//alert(dataString);
	if(email==''|| pass==''|| username=='' || mob=='' || gen=='' || prog=='' || course=='' || usertype=='')
   {
   		$("#err1").show();
    	$("#err1").html("Fill all the details before you submit. ");
	}
	else
	{

// AJAX Code To Submit Form.
	$.ajax({
	type: "POST",
	url: "ajax_registration.php",
	data: dataString,
	cache: false,
	success: function(result){
	//	$("#err").show();
	$('#err1').html(result);
	$("#err1").hide().slideDown();
			  		setTimeout(function(){
				  	$("#err1").hide();        
			  }, 3000);
			
	}
	});
	}
return false;
		
		
		});
	
	});
	
	</script>
 
	<script src="ajax_insert.js"></script>
<!-- registration model end -->
	
	</body>
</html>

