 <?php
 require('../config.php');
 extract($_POST);
 ?>
<div class="table-responsive">
  <table class="table">
	<tr>
		<th colspan="5">
<a href="index.php?option=assign_instructor"><spna class="glyphicon glyphicon-plus-sign"></span></a>&nbsp;&nbsp;</th>
	</tr>
	   	<tr class="success">
		<th>Sr. No</th>
		<th>Stu_Name</th>
		<th>Instructor</th>
		<th>Delete</th>
	</tr>
<?php
	$que=mysql_query("select * from   assign_instructor");
		while($row= mysql_fetch_array($que))
	{?>
	<tr  class="warning">
		<Td><?php echo $row[0];?></Td>
		<!-- for student name -->
		<Td>
		<?php 
		$stu=mysql_query("select name from users where id=$row[1]");
		$stu1=mysql_fetch_assoc($stu);
		echo $stu1['name'];
		?>
		</Td>
		<!-- studnet end-->
		
		<!-- for supervisior name -->
		<Td>
		<?php 
		$sup=mysql_query("select name from instructor where id=$row[2]");
		$sup1=mysql_fetch_assoc($sup);
		echo $sup1['name'];
		?>
		</Td>
		<!-- supervisior end-->
	
		<!-- for supervisior name -->
		

<td>
<a href="delete_assigned_instructor_student.php?id=<?php echo $row[0];?>"><spna style="color:red" class="glyphicon glyphicon-remove-circle"></span></a></td>
	</tr>
	
	<?php } ?>
  </table>
  
