<?php
function select($table,$column,$value){
    include '../backend/config.php';
    $sql="SELECT * FROM ".$table." where ".$column."='$value'";
    $result=mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
?>