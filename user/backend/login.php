<?php
 session_start();
include 'config.php';


if (isset($_POST)) {
    // if (!empty($_SESSION['email'])) { 
        require_once('../assets/selectfromuser.php');
        $email = $_POST['email'];
        $password = $_POST['password'];
        $table_name = 'user';
        $column = 'email';

       $row= select($table_name, $column, $email);
        

        if ($row) {
            $hash_password=$row['Password'];
            if (password_verify($password, $hash_password)) {

               $_SESSION['Id'] = $row['Id'];
                // var_dump($_SESSION);
                // die();
               include "../assets/session.php";
               $Usertype =$userData['role'];
            //   var_dump($Usertype);
            //    die();
               
               if($Usertype === 'super_admin' || $Usertype === 'admin' ){
                if($Usertype === 'super_admin'){
                    header('Location: ../frontend/super_admin.php');
                }else{
                    header('Location: ../frontend/admin_admin.php');
                }
            }else{
                header('Location: ../frontend/user_homepage.php');
            }   
               
            } else {
                echo "Wrong password";
            }
        } else {
            echo "No user found";
        }
    }
// }
?>
