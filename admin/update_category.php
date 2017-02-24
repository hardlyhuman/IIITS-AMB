<?php 
 extract($_POST);
 if(isset($update))
 {
 	 $que=mysqli_query($con,"update category set name='$cat' where id='".$_GET['id']."'");
	$err="<font color='blue'>Category Updated</font>";
	 
 }

$rs=mysqli_query($con,"select * from category where id='{$_GET[id]}'");
$r=mysqli_fetch_array($rs);


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
    <label for="exampleInputEmail1">Your Category </label>
    <input type="text" class="form-control" name="cat" value="<?php echo $r[1]; ?>"  required>
  </div> 
  </div>
  </div>
  
  <div class="row">
  <div class="col-sm-6">
  <div class="form-group">
    <button name="update" class="btn btn-lg btn-success btn-block" type="submit">Update Category</button>
	
  </div>
  </div>
 </div> 
