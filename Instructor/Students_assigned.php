<div class="table table-bordered">
  <table class="table">
	   	<tr class="info">
		<th>Sr. No</th>
		<th>Student Name</th>
		<th>Eamil</th>
		<th>Mobile</th>
		<th>Programe</th>
		<th>Course</th>
	</tr>
<?php
	$que=mysqli_query($con,"select * from  student where course='".$inst['course']."'");
$i=1;
while($row= mysqli_fetch_array($que))
	{?>
	<tr  class="active">
		<Td><?php echo $i;?></Td>
		<!-- for student name -->
		<Td>
		<?php 
		
		echo $row['name'];
		?>
		</Td>
		
		<Td>
		<?php 
	
		echo $row['email'];
		?>
		</Td>
		<Td>
		<?php 
	
		echo $row['mob'];
		?>
		</Td>
		<Td>
		<?php 
	
		echo $row['program'];
		?>
		</Td>
		<Td>
		<?php 
	
		$que1=mysqli_query($con,"select * from  category where id='".$row['course']."'");
$re= mysqli_fetch_array($que1);
echo $re['name'];
		?>
		</Td>

	</tr>
	
	<?php $i++;} ?>
  </table>
  
