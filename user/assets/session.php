<?php
// Logged In UserData || Session Check
if (!empty($_SESSION['Id'])) {
    $id=$_SESSION['Id'];
    // include '../assets/getusertype.php';
    $sql = "SELECT * FROM user where Id =$id";
    $result = mysqli_query($connect, $sql);
    $userData = mysqli_fetch_assoc($result);

   
    // switch ($Usertype) {
    //     case 'user':
    //         header('Location: ../frontend/user_homepage.php');
    //         break;
    //     case 'admin':
    //         break;
    //     case 'super_admin':
    //         echo 'hello';
    //         break;
    //         // header('Location: ../frontend/super_admin.php');
    //         // break;
    //     default:
    //         break;
    // }
     
    // if ($Usertype === 'super_admin') {
    //     header('Location: ../frontend/super_admin.php');    
    // } elseif ($Usertype === 'admin') {
    //     header('Location: ../frontend/admin_homepage.php');
    // } else {
    //     header('Location: ../frontend/user_homepage.php');
    // }   
} else {
    header('Location:../backend/logout.php');
}

