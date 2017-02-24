 <?php
 require('../config.php');
 extract($_POST);
 ?>
<div class="table-responsive">
  <table class="table">
   	<caption><h4 style="color:red" align="center">Notification From admin</h4></caption>
	   	
		<tr class="info">
		<th>Sr. No</th>
		<th>Subject</th>
		<th>Message</th>
		<th>Date</th>
		
		
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



</td>


	</tr>
	
	<?php $i++;} ?>
  </table>
  
