<?php
require("../config.php");
mysqli_query($con,"delete from category where id='{$_GET['id']}'");
header('location:index.php?option=category');
?>
