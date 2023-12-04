<?php
include '../../backend/config.php';
$result=$_GET['role_name'];
$sql="UPDATE role set role=$role where role_id=$role_id ";
$result=mysqli_query($connect, $sql);  
if($result){
        echo"";

}
?>