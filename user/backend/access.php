<?php
include 'config.php';
session_start();
include '../assets/selectfromuser.php';
include '../assets/select_all.php';
//session halna baki cha
$session_id = 1;
$row = select('user', 'Id', '1', '   role_id');
//user ko role

// $role_id=$row['role_id'];
// $condition = "role_id ='".$row. "'";
// $permission = array();
$allowed_permission = array();
// $permission = selectAll('permission', 'per_id');
$sql = "SELECT permission_id FROM roles_permission WHERE role_id=1";
$result = mysqli_query($connect, $sql);
while ($rows = mysqli_fetch_assoc($result)) {
    $allowed_permission[] = $rows['permission_id'];
}
// var_dump($allowed_permission);
// die();
function check_user_permission($allowed_permissions,$per_id)
{
    $found = false;
    // foreach ($allowed_permissions as $element) {
        if (in_array(3, $allowed_permissions)) {
            // var_dump(in_array($element, $permission));
            $found = true;

            var_dump($found);
            die();

            // break;
        }
    
    if ($found) {
        var_dump($found);
            die();
        // echo 'found';
    } else {
        var_dump($found);
        die();
        // header('Location: ../instagram.com');
    }
}

check_user_permission($allowed_permission,$per_id);

// Usage
// check_user_role([2, 4, 8]);

