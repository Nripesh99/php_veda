<?php
include 'config.php';
// session_start();
@include '../assets/session.php';
@include '../assets/selectfromuser.php';
@include_once '../assets/select_all.php';
//using for folder
@include '../../assets/selectfromuser.php';
@include_once '../../assets/select_all.php';
$id=$_SESSION['Id'];
$role_id=$_SESSION['role_id'];

$allowed_permission_type = array();
$allowed_permission_slug = array();

$sql = "SELECT `type`, `slug` FROM roles_permission JOIN permission on roles_permission.permission_id=permission.per_id WHERE role_id=$role_id";
$result = mysqli_query($connect, $sql);
while ($rows = mysqli_fetch_assoc($result)) {
    $allowed_permission_type[] = $rows['type'];
    $allowed_permission_slug[] = $rows['slug'];
    
    
}
// echo '<pre>';
// var_dump($allowed_permission_slug);
// echo '</pre>';
// die();


function check_user_permission($allowed_permission_type,$per_type)
{
 
    $found = false;
        if (in_array($per_type, $allowed_permission_type)) {
           
            $found = true;

        }
    
    if ($found) {
        echo '';
        
    } else {
        header('Location:http://localhost:8000/user/assets/redirect.php');
    }
}
function checkUserPermission($allowed_permission_slug, $per_types){
    $found = false;
    if (in_array($per_types, $allowed_permission_slug)) {
       
        $found = true;

    }

if ($found) {
    echo '';
    
} else {
    header('Location:http://localhost:8000/user/assets/redirect.php');
}

}

