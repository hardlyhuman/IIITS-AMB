 <div class="row">

<div class="col-sm-4">

<div class="panel panel-primary">
<div class="panel-heading"><span class="glyphicon glyphicon-check"> Reports </span>
</div>
<div class="panel-body">

	 
  <div class="form-group">
 

  <table class="table table-responsive table-hover">
                     <?php
$query=mysqli_query($con,"select * from student where id='".$_GET['stu_id']."'");
					  $i=1;
					  echo "<form method='post'>";
					   $rows=mysqli_fetch_array($query);
					 // echo $rows['student_name'];
						   $que=mysqli_query($con,"select * from attendance where stu_id='".$rows['id']."'");
						   $que_att=mysqli_query($con,"select * from attendance where stu_id='".$rows['id']."' and attendance='P' ");
	

$total=mysqli_num_rows($que);
$present=mysqli_num_rows($que_att);
$absent=mysqli_num_rows($que)-mysqli_num_rows($que_att);
		
$perc=($present/$total)*100;			
			?>
					  
					    <thead>
                            <tr>
							<th>
                             Download PDF 
								</th>
						<th><a title="Download Pdf" href="generate_pdf_details.php?stu_id=<?php echo $_GET['stu_id']; ?>"><span class="glyphicon glyphicon-download"></span></a> </th></tr>
						<tr>
                                <th>
                                   Total Attendance 
                                </th>
					<?php echo "<th>".$total."</th>"; ?>
								</tr>
                                <tr>
								<th>
                                  Absent 
								</th>
								<th><?php echo $absent; ?></th>
								</tr>
								
								<tr>
								<th>
                                  Present 
								</th>
						<th><?php echo $present; ?></th></tr>
						
						<tr>
						<th>
                             Present(%) 
								</th>
						<th><?php echo $perc; ?> % </th>
								</tr>
                                
    
					  </tbody>
					  </table>
  

	</div>
</div>

	</div></div>




<div class="col-sm-8">

<div class="panel panel-primary">
<div class="panel-heading"><span class="glyphicon glyphicon-check"> View Attendance Details</span>
</div>
<div class="panel-body">
	
	 
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
                                  Teacher Name
								</th>
								
                                <th>
                                 Attendance
					            </th>
								
								<th>
                                Date
					            </th>
                               
								</tr> 
    <?php
	$stu_id=$_GET['stu_id'];
$query=mysqli_query($con,"select * from attendance where stu_id='".$_GET['stu_id']."'");
					 error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(id) FROM attendance where stu_id='".$_GET['stu_id']."' ";
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
         $sql = "SELECT * ". "FROM attendance where stu_id='".$_GET['stu_id']."' ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysqli_query($con, $sql);
         
         if(! $retval )
		  {
            die('Could not get data: ' . mysqli_error());
         }
         
     $inc=1;
	 $i=1;
	while($rows = mysqli_fetch_array($retval, MYSQL_ASSOC))
	{

		   echo "<tr>";
		    echo "<td>".$i."</td>";

//display student
$que2=mysqli_query($con,"select * from student where id='".$rows['stu_id']."'");
$stu1=mysqli_fetch_array($que2);
echo "<td>".$stu1['name']."</td>";
		   
		   
//display teacher
$que1=mysqli_query($con,"select * from instructor where id='".$rows['super_id']."'");
$teacher1=mysqli_fetch_array($que1);
echo "<td>".$teacher1['name']."</td>";
			 
			 
			 echo "<td>".$rows['attendance']."</td>";
			  echo "<td>".$rows['Date']."</td>";
		   echo "</tr>";
		  $i++; 
		   
		    }
	
			//for shoing Pagination

echo "<tr class='info'><td colspan='8'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?option=view_attendance_details&stu_id=$stu_id&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?option=view_attendance_details&stu_id=$stu_id&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?option=view_attendance_details&stu_id=$stu_id&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?option=view_attendance_details&stu_id=$stu_id&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>
		
</table>

  


	</div>
</div>

	</div>		