<?php
require('../config.php');
$e=$_REQUEST['eid'];
mysqli_query($con,"delete from student  where email='$e'");
echo "<script>window.location='index.php?option=Student'</script>";
?>