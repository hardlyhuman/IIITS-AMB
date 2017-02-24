 <?php
 require('../config.php');
 extract($_POST);
 ?>
<div class="table-responsive">
  <table class="table">
   	<caption><h4 style="color:red" align="center">Sent message to other Instructor</h4></caption>
	   	<tr class="info">
		<th colspan="6"><a href="index.php?option=add_sent_message" title="send message to other instructor">Send message </a></th>
		</tr>
		<tr class="success">
		<th>Sr. No</th>
		<th>Instructor</th>
		<th>Subject</th>
		<th>Message</th>
		<th>Date</th>
		<th>Delete</th>
		</tr>
<?php
$que=mysql_query("select * from  instructor_sent where sender='".$_SESSION['staff']."'");
$i=1;
while($row= mysql_fetch_array($que))
	{
	?>
	<tr  class="danger">
		<Td><?php echo $i;?></Td>
		<Td><?php echo $row[1];?></Td>
		<Td><?php echo $row[3];?></Td>
		<Td><?php echo $row[4];?></Td>
		<Td><?php echo $row[5];?></Td>

<td>
<?php 
$email= $row[1];
$msgid= $row[0];
$to= $row[2];
?>
<?php echo "<a href='delete_sent.php?msgid=$msgid'><span class='glyphicon glyphicon-remove' style='color:red' aria-hidden='true'></span></a></td>";?>

	</tr>
	
	<?php $i++;} ?>
  </table>
  
