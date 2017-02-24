<?php
require('../config.php');
$st=$_REQUEST['status'];
$e=$_REQUEST['eid'];
 if($st)
 {
 mysqli_query($con,"update instructor set status=0 where email='$e'");
 echo "<script>window.location='index.php?option=Instructor'</script>";
 }
 else
 {
 mysqli_query($con,"update instructor set status=1 where email='$e'");
 echo "<script>window.location='index.php?option=Instructor'</script>";
 }
 ?>