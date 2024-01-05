<?php
include 'config.php';
$id=$_GET['id'];
session_start();
$sql="DELETE FROM user where Id=$id";
$result=mysqli_query($connect,$sql);
if($result){
    if($id === $SESSION['Id']){
        $SESSION['message']='login or create new account';
        header('location: logout.php');
        exit;
    }
    // session_start();
    // $_SESSION['message'] = "Deleted succesfully";
    else{
            $_SESSION['message'] = "Deleted succesfully";

       header('Location: http://localhost:8000/user/frontend/fetch_user/index.php');
        exit;

    }

}
else{
    echo "error";
}
?>
