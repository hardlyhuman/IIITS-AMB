<!--  Designed and programmed by Jama Omar Osman
Jamalomarosman@gmail.com is my email
Khartoum is where i reside.
 -->

 <?php
require('../config.php');
extract($_POST);
extract($_GET);
extract($_SESSION); 

 if(isset($send))
 {

	$que=mysql_query("insert into notification values('','$staff','$to','$subj','$msg',now())");
	$err="<font color='blue'>Message send successfully</font>";
 //echo "<script>window.location='index.php?option=Message'</script>";
 }
 ?>
 
 <div class="row">
<div class="col-sm-0">
</div>
<div class="col-sm-10">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title" style="color:#8F0BB0;" align="center">Reply to Admin </h3>
</div>
<div class="panel-body">

 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 	 
  <div class="form-group">
    <label for="exampleInputEmail1">To</label>
    <input type="email" class="form-control" value="<?php echo @$to; ?>" name="to" id="exampleInputEmail1" placeholder="Enter email" required readonly="true">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Subject</label>
    <input type="text" class="form-control" name="subj" id="exampleInputPassword1" placeholder="Subject" required>
  </div>
  
  
  
<div class="form-group">
    <label for="exampleInputEmail1">Message</label>
   <textarea class="form-control" name="msg" rows="3" placeholder="Message" required></textarea>
  </div> 
<!-- programme end-->
<br/>
<div class="form-group">
    <button name="send" class="btn btn-lg btn-primary btn-block" type="submit">Reply</button>
</div>
	</form>	
	
		</div>
	</div>
</div>

	</div>		