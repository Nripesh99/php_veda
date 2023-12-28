<?php
include 'config.php';
$id=$_GET['id'];
$sql="DELETE FROM user where Id=$id";
$result=mysqli_query($connect,$sql);
if($result){
    if($id === $SESSION['Id']){

        header('location: logout.php');
        exit;
    }
    // session_start();
    // $_SESSION['message'] = "Deleted succesfully";
    else{
       header('Location: http://localhost:8000/user/frontend/fetch_user/index.php');
        exit;

    }

}
else{
    echo "error";
}
?>
