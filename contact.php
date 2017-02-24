 <?php
require('config.php');
 extract($_POST);
 
 if(isset($send))
 {
	$que=mysqli_query($con,"insert into contact values('','$name','$eid','$mob','$msg',now())");
	$err="<font color='blue'>Thankyou. We will get back to you soon </font>";
 
 }
 ?>
 	<Div class="col-md-4">
<h3>Ping Me to know more</h3><br/>
<span class="glyphicon glyphicon-user"></span> Name :Sri Harsha<br/><br/>
<span class="glyphicon glyphicon-envelope"></span> Email: sriharsha.g15@iiits.in<br/><br/>
<span class="glyphicon glyphicon-phone"></span> Watsapp: (+91) 9100753548<br/><br/>
<span class="glyphicon glyphicon-map-marker"></span> Portfolio: <a href="http://www.donglee.biz">My Site</a><br/>
		
	</Div>
 	<div class="col-md-8">
 
 
 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 
	<h4><font color="#0000CC"> Your Feedback Matters!!! </font><br />
</h4>
  <div class="form-group">
    <label for="exampleInputEmail1">Name <font color="red">*</font></label>
    <input type="text" class="form-control" name="name"  placeholder="Enter your full names" pattern="[a-z A-Z]*" required>
  </div>
	 
  <div class="form-group">
    <label for="exampleInputEmail1">Email address <font color="red">*</font></label>
    <input type="email" class="form-control" name="eid" id="exampleInputEmail1" placeholder="Enter your email address" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Mobile <font color="red">*</font></label>
    <input type="text" class="form-control" name="mob" maxlength="10" required pattern="[0-9 + ]*"  placeholder="Enter your mobile number" >
  </div> 

  
  
  
<div class="form-group">
    <label for="exampleInputEmail1">Message <font color="red">*</font></label>
   <textarea class="form-control" name="msg" rows="3" maxlength="250" placeholder="A brief message or query" required></textarea>
  </div> 

<br/>
<div class="form-group">
    <button style="width:150px" name="send" class="btn btn-lg btn-primary btn-block" type="submit">Feed it</button>
</div>
	</form>	
	</div>
	
