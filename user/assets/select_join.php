<?php
function select_join($user,$role,$role_id,$user_id,$Id, $column="*"){
    include '../backend/config.php';
    $sql = "SELECT $column FROM `$user` JOIN `$role` ON $user.$role_id=$role.$role_id WHERE $user_id=$Id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result); 
    return $row;
}
//SELECT role FROM role JOIN user ON user.role_id=role.role_id WHERE Id=22;


?>