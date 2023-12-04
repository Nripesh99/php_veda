<?php
include '../../backend/config.php';
$role_id=$_GET['role_id'];
if($role_id!='3'){

    $sql="DELETE FROM role WHERE role_id=$role_id";
    $result=mysqli_query($connect,$sql);
}
?>