 <?php
require('../config.php');
extract($_POST);
extract($_GET);
extract($_SESSION); 

 if(isset($assign))
 {
 //$que=mysql_query("select id from supervisor where email='$sup'");
$result=mysql_query("SELECT count(super_id) as total from assign_instructor ");
$data=mysql_fetch_assoc($result);
$countstu=$data['total'];


	if($countstu<=10)
	{
		foreach($stu as $s)
		{
		$que=mysql_query("insert into assign_instructor values('','$s','$sup',now(),now())");
		}		
 		echo "<script>alert('New instructor assigned to student')</script>";
	}
	else
	{	
		echo "<script>alert('You cant assign more than 10 students')</script>";
	}	
 
 }
 ?>
 
 <div class="row">
<div class="col-sm-0">
</div>
<div class="col-sm-10">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title" style="color:#8F0BB0;" align="center">Assign Supervisior</h3>
</div>
<div class="panel-body">

		
 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 
	
	 
  <div class="form-group">
    <label for="exampleInputEmail1">Select Student</label>
   <select class="form-control" name="stu[]" multiple="multiple">
  <option value="" selected="selected" disabled="disabled">Select Student</option>
 	<?php 
	$stu=mysql_query("select * from users");
	while($rr=mysql_fetch_array($stu))
	{
	echo "<option value=$rr[0]>".$rr['name']."</option>";
	}
	?>
</select>
  </div>
  
  
<div class="form-group">
    <label for="exampleInputEmail1">Select Instructor</label>
   <select class="form-control" name="sup">
  <option value="" selected="selected" disabled="disabled">Select Instructor</option>
 	<?php 
	$sql=mysql_query("select * from instructor");
	while($r=mysql_fetch_array($sql))
	{
	echo "<option value=$r[0]>".$r['name']."</option>";
	}
	?>
</select>
  </div> 

  
<br/>
<div class="form-group">
    <button name="assign" class="btn btn-lg btn-primary btn-block" type="submit">Assign Supervisior</button>
</div>
	</form>	
	
		</div>
	</div>
</div>

	</div>		