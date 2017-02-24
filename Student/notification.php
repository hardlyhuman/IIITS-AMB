 <?php
 require('../config.php');
 extract($_POST);
 ?>
<div class="table-responsive">
  <table class="table">
   	<caption><h4 style="color:red" align="center">See Notification From admin</h4></caption>
	   	
		<tr class="success">
		<th>Sr. No</th>
		<th>Subject</th>
		<th>Message</th>
		<th>Date</th>
		<th>Delete</th>
		
		</tr>
<?php
$que=mysqli_query($con,"select * from  notification where Instructor='".$_SESSION['staff']."'");
$i=1;
while($row= mysqli_fetch_array($que))
	{
	?>
	<tr  class="active">
		<Td><?php echo $i;?></Td>
		<Td><?php echo $row[3];?></Td>
		<Td><?php echo $row[4];?></Td>
		<Td><?php echo $row[5];?></Td>

<td>
<?php 
$email= $row[1];
$msgid= $row[0];
$to= $row[2];
?>
<?php echo "<a href='delete_notification.php?eid=$email&msgid=$msgid'><span class='glyphicon glyphicon-remove' style='color:red' aria-hidden='true'></span></a></td><td>";?>


</td>


	</tr>
	
	<?php $i++;} ?>
  </table>
  
