<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='deletecategory.php?id='+id;
     }
}
</script>	

<table class="table table-bordered">
<tr class="active" height="30px">
	<td colspan="5">
	<a href="index.php?option=add_category" >Add New Category</a></td>
</tr>
<tr class="info" height="30">
	<Th>Sr. No</Th>
	<th>Category</th>
	<th>Delete</th>
	<th>Update</th>
	
</tr>

<?php 
error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(id) FROM category ";
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
         $sql = "SELECT * ". "FROM category ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysqli_query($con, $sql);
         
         if(! $retval )
		  {
            die('Could not get data: ' . mysqli_error());
         }
         
     $inc=1;
	 $i=1;
	while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
	{
$id=$row[0];
echo "<tr class='active'>";
echo "<th>".$i."</th>";
echo "<th>".$row['name']."</th>";


echo "<td class='text-center'><a href='#' onclick='deletes($r[id])'><span class='glyphicon glyphicon-remove' style=color:red;></span></a></td>";



echo "<th><a href='index.php?option=update_category&id=$id'><span class='glyphicon glyphicon-pencil'></span></a>
</th>";
echo "<tr>";
$i++;
}








//for shoing Pagination
echo "<tr class='info'><td colspan='4'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?option=category&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?option=category&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?option=category&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?option=category&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>


</table>