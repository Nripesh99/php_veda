<?php
include 'config.php';
$id=$_GET['id'];
$sql="DELETE FROM user where Id=$id";
$result=mysqli_query($connect,$sql);
if($result){
    // session_start();
    // $_SESSION['message'] = "Deleted succesfully";
    header('Location: /php_veda/user/frontend/user.php');

}
else{
    echo "error";
}
?>
