<?php
include '../../backend/config.php';
if(isset($_POST['submit'])){
    $per_name=$_POST['per_name'];
    $sql="INSERT INTO `permission`( `per_name`) VALUES ('$per_name')";
     $result=mysqli_query($connect,$sql);
    if($result){
        session_start();
        $_SESSION['message']="Added permission";
        header('Location:../../frontend/permission.php');
    }
}
?>
