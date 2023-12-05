<?php
include '../../backend/config.php';
$per_id=$_GET['id'];
    $sql="DELETE FROM permission WHERE per_id=$per_id";
    $result=mysqli_query($connect,$sql);
    if($result){
        echo "Deleted  succesfully";
        header('Location:../../frontend/role.php');
    }
?>