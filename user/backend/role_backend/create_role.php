<?php
include '../../assets/session.php';
include '../../backend/config.php';
// include '../access.php';
// check_user_permission($allowed_permission, '3');

if(isset($_POST['submit'])){
    $role_name=$_POST['role_name'];
    $role_desc=$_POST['role_desc'];
    $sql="INSERT INTO `role`( `role`, `role_description`) VALUES ('$role_name','$role_desc')";
    $result=mysqli_query($connect,$sql);
    if($result){
        $_SESSION['message']='role added succesfully';
        header('Location:../../frontend/role.php');
    }
}
?>