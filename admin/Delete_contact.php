<?php
require('../config.php');
extract($_GET);
mysqli_query($con,"delete from contact  where id='$id'");
echo "<script>window.location='index.php?option=contact'</script>";
?>