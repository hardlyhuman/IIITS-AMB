<script>
function deleteAttendance(id)
{
	if(confirm("You want to delete this record ?"))
	{
	 window.location.href="delete_attendance.php?stu_id="+id;
	}
}
</script>
<div class="row">
<div class="col-sm-0">
</div>
<div class="col-sm-10">

<div class="panel panel-primary">
<div class="panel-heading"><span class="glyphicon glyphicon-check"> View All Attendance</span>

</div>
<div class="panel-body">
		
	<div class="form-group">
    <label for="exampleInputEmail1"><a style="color:#000" href="generate_pdf.php?course=<?php echo $inst['course']; ?>"><span class="glyphicon glyphicon-print"></span> Download PDF</a></label>   
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
                                 More Details
					       	    </th>
								<th>
                                Delete
					       	    </th>
								</tr> 
    <?php
error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(id) FROM student where course='".$inst['course']."'";
         $retval = mysqli_query($con,$sql);
         
         if(! $retval )
		  {
            die('Could not get data: ' . mysqli_error());
         }
         $row = mysqli_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'pagi'} ) ) {
            $pagi = $_GET{'pagi'} + 1;
            $offset = $rec_limit * $pagi ;
         }else {
            $pagi = 0;
            $offset = 0;
         }
         
		 
         $left_rec = $rec_count - ($pagi * $rec_limit);
         $sql = "SELECT * ". "FROM student where course='".$inst['course']."'".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysqli_query($con, $sql);
         
         if(! $retval )
		  {
            die('Could not get data: ' . mysqli_error());
         }
         
     $inc=1;
	 $i=1;
	while($rows = mysqli_fetch_array($retval, MYSQL_ASSOC))
	{ // echo $rows['student_name'];
						   $que=mysqli_query($con,"select * from attendance where stu_id='".$rows['id']."'");
						   $que_att=mysqli_query($con,"select * from attendance where stu_id='".$rows['id']."' and attendance='P' ");
						   
	echo "<td>".$i++."</td>";
	
echo "<td>".$rows['name']."</td>";
echo "<td>".mysqli_num_rows($que_att)."</td>";
$absent=mysqli_num_rows($que)-mysqli_num_rows($que_att);

echo "<td>".$absent."</td>";
echo "<td>".mysqli_num_rows($que)."</td>";
					
echo "<td><a title='view details ' href='index.php?option=view_attendance_details&stu_id=".$rows['id']."'><span style='color:green' class='glyphicon glyphicon-share'></span></a></td>";					
						                                                     
					 
			?>
		<td>	
 <a href="javascript:deleteAttendance(<?php echo $rows['id']; ?>)"><span class="glyphicon glyphicon-remove" style="color:#FF0000"></span></a>
 </td>
 </tr>
 <?php }
 
 
 //for shoing Pagination

echo "<tr class='info'><td colspan='7'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?option=view_attendance&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?option=view_attendance&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?option=view_attendance&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?option=view_attendance&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>
		
</table>
	</div>
</div>

	</div>	