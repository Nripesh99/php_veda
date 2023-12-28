<?php
include '../../backend/config.php';
$role_id=$_GET['id'];

    $sql="DELETE FROM role WHERE role_id=$role_id";
    $result=mysqli_query($connect,$sql);
    if($result){
        echo "Deleted  succesfully";
        header('Location:../../frontend/fetch_role/index.php');
    }
?>