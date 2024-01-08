<?php
include '../../backend/config.php';
include '../../assets/session.php';

include '../access.php';
session_start();
check_user_permission($allowed_permission_type, 'permission');
checkUserPermission($allowed_permission_slug,'permission_delete');
$per_id=$_GET['id'];
    $sql="DELETE FROM permission WHERE per_id=$per_id";
    $result=mysqli_query($connect,$sql);
    if($result){
        $_SESSION['message']= "Deleted  succesfully";
        header('Location:../../frontend/fetch_permission/index.php');
    }
?>