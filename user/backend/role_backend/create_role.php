<?php
include '../../backend/config.php';
$role_name=$_POST['role_name'];
$sql="INSERT INTO `role`( `role`) VALUES ('$role_name')";
$result=mysqli_query($connect,$sql);
?>