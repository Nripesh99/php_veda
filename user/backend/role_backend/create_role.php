<?php
include '../../backend/config.php';
if(isset($_POST['submit'])){
    $role_name=$_POST['role_name'];
    $role_desc=$_POST['role_desc'];
    $sql="INSERT INTO `role`( `role`, `role_description`) VALUES ('$role_name','$role_desc')";
    $result=mysqli_query($connect,$sql);
    if($result){
        header('Location:../../frontend/role.php');
    }
}
?>