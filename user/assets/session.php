<?php
session_start();
if (empty($_SESSION['Id'])) {
    header('location:../backend/logout.php');
} else {
    //     $id = $_SESSION['Id'];
//     include_once '../backend/config.php';
//     include_once 'select_join.php';
//     $Usertype = select_join('user', 'role', 'role_id', 'Id', $id, 'role');
//     // var_dump($Usertype);
//     // die();  
//     $usertype=implode($Usertype);

    //     if ($usertype === 'super_admin' || $usertype === 'admin') {
//         if ($usertype === 'super_admin') {
//             header('Location: ../frontend/super_admin.php');
//         } else {
//             header('Location: ../frontend/admin_admin.php');
//         }
//     } else {
//         header('Location: ../frontend/user_homepage.php');
//     }
// }
    echo "";
}


?>