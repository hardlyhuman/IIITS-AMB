 <?php
require('../config.php');
extract($_POST);
extract($_SESSION); 
 if(isset($send))
 {
$que=mysqli_query($con,"insert into notification values('','$admin','$sup','$subj','$msg',now())");
 echo "<script>alert('Notification sent')</script>";
 }
 ?>
 <div class="row">
<div class="col-sm-0">
</div>
<div class="col-sm-10">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title" style="color:#000;" align="center">Add Notification to Instructor</h3>
</div>
<div class="panel-body">

 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 
  <div class="form-group">
    <label for="exampleInputEmail1">Select Instructor</label>
   <select class="form-control" name="sup" required>
  <option value="" selected="selected" disabled="disabled">Select Instructor</option>
 	<?php 
	$sql=mysqli_query($con,"select * from instructor");
	while($r=mysqli_fetch_array($sql))
	{
	echo "<option value=$r[email]>".$r['name']."</option>";
	}
	?>
</select>
  </div> 
<!-- supervisior end-->

<div class="form-group">
    <label for="exampleInputEmail1">Subject</label>
   <input type="text" class="form-control" name="subj"  placeholder="Subject" required>
   
  </div> 

  
<div class="form-group">
    <label for="exampleInputEmail1">Notification</label>
   <textarea class="form-control" name="msg" rows="4" placeholder="Message" required></textarea>
  </div> 


<br/>
<div class="form-group">
    <button name="send" class="btn btn-lg btn-primary btn-block" type="submit">Add Notification</button>
</div>
	</form>	
		</div>
	</div>
</div>

	</div>		