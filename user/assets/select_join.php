<?php
function select_join($user,$role,$role_id){
    include '../backend/config.php';
    $sql = "SELECT * FROM `$user` JOIN `$role` ON $user.$role_id=$role.$role_id;";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

?>