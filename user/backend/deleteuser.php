<?php
include 'config.php';
$id=$_SESSION['Id'];
$sql="DELETE FROM user where Id=$id";
$result=mysqli_query($connect,$sql);
if($result){
    echo "Deleted succesfully";

}
else{
    echo "error";
}
?>
