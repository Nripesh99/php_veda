<?php
function select($table,$column,$value, $selectcolumn = "*"){
    include '../backend/config.php';
    $sql="SELECT $selectcolumn FROM ".$table." where ".$column."='$value'";
    $result=mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
?>