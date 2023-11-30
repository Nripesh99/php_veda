<?php
function getUserType($id)
{
    include '../backend/config.php';
    // session_start();
    // echo $id;
    $sql = "SELECT usertype FROM user where Id =$id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $a=$row['usertype'];
    return $a ;
}

?>