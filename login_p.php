<!-- for login -->
<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    	<div class="modal-content">
   
        <div class="modal-header" style=" background-color:#232323;   color:#fff;">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-log-in"style=" background-color:#284761; margin-left:180px; color:#fff;">&nbsp;Login</h4>
      	</div>
      	<div class="modal-body">
	
         	<div class="alert alert-success" id="err" role="alert"></div>  
	     	<form action="#" method="post">
			<div class="form-group">
				<div class="input-group input-group-sm">
		 
		 <span class="input-group-addon">  
		 <span class="glyphicon glyphicon-envelope"></span></span>
						
	 <input type="email" class="form-control" name="email"  id="email" placeholder="Email"/>
	</div>
	</div>

	<!-- for password-->
	<div class="form-group">
	<div class="input-group input-group-sm">
							
		<span class="input-group-addon">  
		 <span class="glyphicon glyphicon-lock"></span></span>
							
	 <input type="password" class="form-control" name="pass"  id="pass" placeholder="password"/>
					
		</div>
	</div>
	<!-- password end -->
	
		<!-- for user type-->
	<div class="form-group">
	<div class="input-group input-group-sm">
							
		<span class="input-group-addon">  
		 <span class="glyphicon glyphicon-user"></span></span>
							
	 <select  class="form-control" name="user"  id="user">
		<option value="1">Student</option>
		<option value="2">Instructor</option>
		<option value="3">Admin</option>
	 </select>
					
		</div>
	</div>
	
	
	  
      
    <div class="modal-footer">
        <input type="submit" class="btn btn-success" id="save1"  value="Login" name="login" />
		<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
	</div>
</form>
</div> 
  </div>
   		<script src="jquery-1.11.2.min.js"></script>
<script>

$(document).ready(function()
{	
	$("#err").hide();
	$("#save1").click(function()
	{		
	var email1 =$('#email').val();
	var pass1 =$('#pass').val();	
	var user =$('#user').val();
	var dataString = 'email_id='+ email1+'&password='+pass1+'&user='+user  ;
	
	if(email1== '' )
	{	
		$("#err").show();
		$("#err").hide().slideDown();
		setTimeout(function(){
		$("#err").hide();        
		}, 3000);
		
 		$("#err").html("Please enter email ");
	} 
	else if(pass1=='')
	{
	$("#err").show();
	$("#err").hide().slideDown();
	setTimeout(function(){
	$("#err").hide();        
			  }, 3000);
			  
 	$("#err").html("Please enter password");
	}
	else
	{
	$.ajax({
	type: "POST",
	url: "ajax_login.php",
	data: dataString,
	cache: false,
	success: function(result){
	$("#err").show(300);
	$('#err').html(result);
	$("#err").hide().slideDown();
	setTimeout(function(){
				  	$("#err").hide();        
			  }, 3000);
	
	}
	});
	}
return false;
			
	});
	
});
</script>

   
    </div>
  </div>
</div>
<!-- login model end -->