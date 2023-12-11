<?php
include 'config.php';
session_start();
include '../assets/selectfromuser.php';
//session halna baki cha
$session_id=1;
$row=select('user','Id','1', 'role_id');
//user ko role
// $role_id=$row['role_id'];
// $condition = "role_id ='".$row. "'";
$premission=select('roles_permission','role_id ', $row['role_id'], 'permission_id');
var_dump($premission);

function check_user_role($allowed_roles)
{
    // Assuming session_start() has been called before this function
    $user_id = $_SESSION['user_id']; // Assuming the session key is 'user_id'
    
    // Assuming $this->Role_model->get_role($user_id) is a function that retrieves the user role


    if (!in_array($premission, $allowed_roles)) {
        header('Location: ' . 'ecommerce/logout'); // Redirect using header
        exit(); // Make sure to exit after redirecting
    }
}
$data = [2,4,6];
check_user_role($data);
// Usage
check_user_role([2, 4, 8]);


?>
