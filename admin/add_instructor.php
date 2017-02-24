 <?php 
 extract($_POST);
 if(isset($signup))
 {

	//Instructor
	if($user==2){
	 $que=mysqli_query($con,"select * from instructor where email='$e' and course='$course'");
	 $row= mysqli_num_rows($que);
	 if($row)
	 {
	$err="<font color='red'>Instructor already registered</font>";
	 }
	 else
	 {
	 mysqli_query($con,"insert into instructor values('','$n','$e',password('$pass'),'$mob','$g','$prog','$course','1')");
$err="<font color='blue'>Instructor added Successfully</font>";
	 }
	 }
	 
 
 }
 ?>

<div class="row">
<div class="col-sm-12">
 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  	</div> 
  </div>
 </div> 


<div class="row">
<div class="col-sm-6">
	 <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="n"  placeholder="Enter name" pattern="[a-z A-Z]*" required>
  </div> 
  </div>
  
  <div class="col-sm-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="e" id="exampleInputEmail1" placeholder="Enter email" required>
  </div>
  </div>
 </div> 




  
<div class="row">
<div class="col-sm-6">
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" >
  </div>
  </div>
  
  <div class="col-sm-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input type="text" class="form-control" name="mob" maxlength="13" required pattern="[0-9 + ]*"  placeholder="Enter Mobile" >
  </div> 
  </div>
</div>  
  

<div class="row">
<div class="col-sm-6">
<div class="form-group">
    <label for="exampleInputEmail1">Gender</label>
   <select class="form-control" name="g">
  <option value="m">Male</option>
  <option value="f">Female</option>
  </select>
  </div> 
  </div>
  
<div class="col-sm-6">
<div class="form-group">
    <label for="exampleInputEmail1">Programme</label>
   <select class="form-control" name="prog">
  <option>M.Tech</option>
  <option>B.Tech</option>
  <option>BCA</option>
  <option>MCA</option>
  <option>Other</option>
</select>
  </div> 
  </div>
</div>  
<!-- programme end-->
<div class="row">
<div class="col-sm-6">
<div class="form-group">
    <label for="exampleInputEmail1">Course Category</label>
   <select class="form-control" name="course">
  <option selected="selected" disabled="disabled"><strong>Select Course</strong></option>
  <?php 
  $que1=mysqli_query($con,"select * from category");
	 while($ro= mysqli_fetch_array($que1))
	 {
	 echo "<option value='".$ro['id']."'>".$ro['name']."</option>";
	 }
  ?>

</select>
  </div> 
  </div>
  
<!-- Course end-->
<div class="col-sm-6">
<div class="form-group">
    <label for="exampleInputEmail1">User Type</label>
   <select class="form-control" name="user">
  <option value="2">Teacher</option>
</select>
  </div> 
  </div>
 </div> 
<!-- user end-->

<div class="row">

<div class="col-sm-4">
 
         <button name="signup" class="btn btn-lg btn-success btn-block" type="submit" style="width:175px">Add New Instructor</button>
</form>	
	</div>
	</div>
