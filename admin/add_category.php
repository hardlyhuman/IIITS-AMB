<?php 
 extract($_POST);
 if(isset($add))
 {
 	 $que=mysqli_query($con,"select * from category where name='$cat'");
	 $row= mysqli_num_rows($que);
	 if($row)
	 {
	$err="<font color='red'>Category already exists</font>";
	 }
	 else
	 {$que=mysqli_query($con,"insert into category values('','$cat')");
	 $err="<font color='blue'>Category added</font>";
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
    <label for="exampleInputEmail1">Enter Category Name</label>
    <input type="text" class="form-control" name="cat"  required>
  </div> 
  </div>
  </div>
  
  <div class="row">
  <div class="col-sm-6">
  <div class="form-group">
 <button name="add" class="btn btn-lg btn-success btn-block" type="submit">Add Category</button>
	
  </div>
  </div>
 </div> 
