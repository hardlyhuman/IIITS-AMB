 <?php
 require('../config.php');
 extract($_POST);
 ?>
<div class="table-responsive">
  <table class="table">
	 <tr  class="danger">
	 	<th colspan="8"><a title="Add notification to Instructor" href="index.php?option=notification_add"><span class=" glyphicon glyphicon-plus-sign" style="color:black"></span></a></th>
	 </tr>
	   	
		<tr class="info">
		<th>Sr. No</th>
		<th>Instructor</th>
		<th>Subject</th>
		<th>Notification</th>
		<th>Date</th>
		<th>Delete</th>
		
		</tr>
<?php
	$que=mysqli_query($con,"select * from  notification");
		while($row= mysqli_fetch_array($que))
	{?>
	<tr  class="active">
		<Td><?php echo $row[0];?></Td>
		<Td><?php echo $row[2];?></Td>
		<Td><?php echo $row[3];?></Td>
		<Td><?php echo $row[4];?></Td>
		<Td><?php echo $row[5];?></Td>
		

<td>
<?php 
$email= $row[1];
$msgid= $row[0];
$to= $row[2];
?>
<?php echo "<a href='notification_Delete.php?eid=$email&msgid=$msgid'><span class='glyphicon glyphicon-remove' style='color:red' aria-hidden='true'></span></a>";?>
</td>



	</tr>
	
	<?php } ?>
  </table>
  
