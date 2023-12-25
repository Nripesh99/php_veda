<?php
require_once("../assets/select_join.php");
session_start();

if(empty($_SESSION['id'])){
    header('location: ../backend/logout.php');
}
$usertype = implode(select_join('user', 'role', 'role_id', 'Id', $_SESSION['Id'], 'role'));
// $usertype = implode($Usertype);
if ($usertype === 'super_admin' || $usertype === 'admin') {
    if ($usertype === 'super_admin') {
        header('Location: ../frontend/admin_dashboard.php');
    } else {
        header('Location: ../frontend/admin_admin.php');
    }
} else {
    header('Location: ../frontend/user_homepage.php');
}

?>