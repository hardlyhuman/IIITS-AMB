 <?php
require('../config.php');
extract($_POST);
 if(isset($upload))
 {
 if(file_exists("img/$student"))
 {
 move_uploaded_file($_FILES['file']['tmp_name'],"img/$student/".$_FILES['file']['name']);
	$err="<font color='blue'>Profile pic uploaded </font>";
 }
 else
 {
 mkdir("img/$student");
 
 move_uploaded_file($_FILES['file']['tmp_name'],"img/$student/".$_FILES['file']['name']);
	$err="<font color='blue'>Profile pic uploaded </font>"; }
 
 
 }
 ?>
 
 <div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-5">

<div class="panel panel-default">
<div class="panel-body">
		
 <form method="post" enctype="multipart/form-data">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 
	
	 

  <div class="form-group">
    <label for="exampleInputEmail1">Upload Profile Pic</label>
   <input type="file" class="form-control" name="file" required></textarea>
  </div> 
  
 	 
  
<br/>
<div class="form-group">
    <button name="upload" class="btn btn-lg btn-success btn-block" type="submit">Upload Profile Pic </button>
</div>
	</form>	
		</div>
	</div>
</div>

	</div>	
	
	
	
	
	
