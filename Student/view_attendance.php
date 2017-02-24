 <div class="row">
<div class="col-sm-0">
</div>
<div class="col-sm-10">

<div class="panel panel-primary">
<div class="panel-heading"><span class="glyphicon glyphicon-check"> View Attendance</span>

</div>
<div class="panel-body">
		
	<div class="form-group">
    <label for="exampleInputEmail1">
	<a style="color:#000" href="index.php?option=view_attendance_details&stu_id=<?php echo $stu['id'];?>"><span class="glyphicon glyphicon-print"></span> Download PDF</a></label>   
  </div> 
	 
	
	 
  <div class="form-group">
 

  <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Sr. No.
                                </th>
                                <th>
                                  Student Name
								</th>
                                <th>
                                 Attended Lecture
					            </th>
								
								<th>
                                 Absent Lecture
					            </th>
                                <th>
                                Total
					       	    </th>
								<th>
                                View Details
					       	    </th>
								</tr> 
    <?php
	
$query=mysqli_query($con,"select * from student where id='".$stu['id']."'");
					  $i=1;
					  echo "<form method='post'>";
					   while($rows=mysqli_fetch_array($query))
					   { // echo $rows['student_name'];
						   $que=mysqli_query($con,"select * from attendance where stu_id='".$rows['id']."'");
						   $que_att=mysqli_query($con,"select * from attendance where stu_id='".$rows['id']."' and attendance='P' ");
						   
	echo "<td>".$i++."</td>";
	
echo "<td>".$rows['name']."</td>";
echo "<td>".mysqli_num_rows($que_att)."</td>";
$absent=mysqli_num_rows($que)-mysqli_num_rows($que_att);

echo "<td>".$absent."</td>";
echo "<td>".mysqli_num_rows($que)."</td>";
					
	echo "<td><a title='view details ' href='index.php?option=view_attendance_details&stu_id=".$rows['id']."'><span style='color:green' class='glyphicon glyphicon-share'></span></a></td></tr>";				
						                                                     
					   }
				
			?>
					  </tbody>
					  </table>
  
 	 
   
<br/>
</form>		

	</div>
</div>

	</div>	