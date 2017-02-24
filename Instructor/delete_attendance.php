<?php
require('../config.php');
extract($_GET);

if(isset($stu_id))
{
mysqli_query($con,"delete from attendance where stu_id='".$stu_id."'");
echo "<script>window.location='index.php?option=view_attendance'</script>";
}


if(isset($att_id))
{
mysqli_query($con,"delete from attendance where id='".$att_id."'");
echo "<script>window.location='index.php?option=view_attendance_details'</script>";
}

?>