<?php
require('../config.php');
extract($_GET);
mysqli_query($con,"delete from notification  where id='$msgid' and  admin ='$eid'");
echo "<script>window.location='index.php?option=notification'</script>";
?>