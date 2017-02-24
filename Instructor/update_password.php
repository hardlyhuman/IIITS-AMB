 <?php
 require('../config.php');
 extract($_POST);
 extract($_SESSION);

 
 if(isset($updpass))
 {
 
	$que=mysqli_query($con,"select * from instructor where email='".$_SESSION['staff']."' and pass=password('$op')");
	
	$row= mysqli_num_rows($que);
	

	 if($row)
	 {
		if($np==$cp)
		{
		mysqli_query($con,"update instructor set pass=password('$np') where email='".$_SESSION['staff']."'");
		$err="<font color='green'>Password Update Successfully !</font>";
		}
		else
		{
		$err="<font color='red'>New Password and Confirm not matched</font>";
		}
	 }
	 else
	 {
	  $err="<font color='red'>Old Password doesn't match</font>";
	 }
 
 }
 ?>

<div class="row">
<div class="col-sm-1">
</div>
<div class="col-sm-9">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title" style="color:#8F0BB0;" align="center">Update Password</h3>
</div>
<div class="panel-body">

 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 
	 
 
  <div class="form-group">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" class="form-control" name="op" id="exampleInputPassword1" placeholder="Old Password">
  </div>
  
   <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" name="np" id="exampleInputPassword1" placeholder="New Password">
  </div>
  
   <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="cp" id="exampleInputPassword1" placeholder="Confirm Password">
  </div>
  
  

<br/>
<div class="form-group">
    <button name="updpass" class="btn btn-lg btn-primary btn-block" type="submit">Update Password</button>
</div>
	</form>	
		</div>
	</div>
</div>

	</div>	