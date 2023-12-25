<?php
include 'config.php';
// session_start();
include '../assets/selectfromuser.php';
include_once '../assets/select_all.php';
$id=$_SESSION['Id'];
// var_dump($id);
// die();
$row = select('user', 'Id', $id, '   role_id');
$role_id=implode($row);
//user ko role

// $role_id=$row['role_id'];
// $condition = "role_id ='".$row. "'";
// $permission = array();
$allowed_permission = array();
// $permission = selectAll('permission', 'per_id');
$sql = "SELECT permission_id FROM roles_permission WHERE role_id=$role_id";
$result = mysqli_query($connect, $sql);
// var_dump($sql);
// die();

while ($rows = mysqli_fetch_assoc($result)) {
    // var_dump($rows);
    $allowed_permission[] = $rows['permission_id'];
}
function check_user_permission($allowed_permission,$per_id)
{
 
    $found = false;
    // foreach ($allowed_permissions as $element) {
        if (in_array($per_id, $allowed_permission)) {
            // var_dump(in_array($element, $permission));
            // die();
            $found = true;

            // break;
        }
    
    if ($found) {
        echo '';
        
    } else {
        // echo 'keacha ';
        header('Location: ../assets/redirect.php');
        // header('Location: ../instagram.com');
    }
}

// check_user_permission($allowed_permission,$per_id);

// Usage

