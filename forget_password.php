 <?php
 require('config.php');
 extract($_POST);
 
 if(isset($signup))
 {

	if($user==1)
	{
	$que=mysqli_query($con,"select email,pass from student where email='$eid' and pass='$pass'");
	 $row= mysqli_num_rows($que);
	 if($row)
	 {
		$_SESSION['student']=$eid;
		echo "<script>window.location='student'</script>";
	 }
	 else
	 {
	  $err="<font color='red'>Invalid Student Login</font>";
	 }
	}
	//for teacher
	if($user==2)
	{
	$que=mysqli_query($con,"select email,pass,status from supervisor where email='$eid' and pass='$pass'");
	 $row= mysqli_num_rows($que);
	 if($row)
	 {
	 	$status=mysqli_fetch_assoc($que);
		if($status['status']==1)
		{
		$err="<font color='red'>Your account is not activated yet by admin</font>";
		}
		else
		{
		$_SESSION['supervisior']=$eid;
		echo "<script>window.location='Supervisor'</script>";
	 	} 
	}
	 else
	 {
	  $err="<font color='red'>Invalid Supervisor Login</font>";
	 }
	}
	
	
	
	//for Admin
	if($user==4)
	{
	$que=mysql_query("select email,pass from admin where email='$eid' and pass='$pass'");
	 $row= mysql_num_rows($que);
	 if($row)
	 {
		$_SESSION['admin']=$eid;
		echo "<script>window.location='admin'</script>";
	 }
	 else
	 {
	  $err="<font color='red'>Invalid admin Login</font>";
	 }
	}
	
 
 }
 ?>
<div class="row">
<div class="col-sm-3">
</div>
<div class="col-sm-6">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title" style="color:#8F0BB0;" align="center">Forgot  Password </h3>
</div>
<div class="panel-body">

 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 
	 
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="eid" id="exampleInputEmail1" placeholder="Enter email" required>
  </div>
  
<div class="form-group">
    <button style="text-align:center" name="signup" class="btn btn-lg btn-primary btn-block" style="width:45%;float:left" type="submit">Recover Password</button>
</div>


	</form>	
	</div>
	</div>
</div>

	</div>