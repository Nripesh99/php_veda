<?php
session_start();
include 'config.php';
if (isset($_POST)) {
    require_once ("../assets/select_join.php");
    include "../assets/selectfromuser.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $table_name = 'user';
    $column = 'email';
    $row = select($table_name, $column, $email);
    if ($row) {
        $hash_password = $row['Password'];
        if (password_verify($password, $hash_password)) {
            $_SESSION['Id'] = $row['Id'];
            // var_dump($_SESSION);
            // die();
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
        } else {
            $_SESSION['message']="Wrong password";
            var_dump($_SESSION);
            header('Location: ../frontend/loginfile.php');
            die();
        }
    } else {
        $_SESSION['message']="No user found";
        var_dump($_SESSION);
        header('Location: ../frontend/loginfile.php');
        
    }
}
