<?php 
if(isset($_POST['submit'])){

 include '../config.php';

$per_id=$_POST['per_id'];
 $per_name=$_POST['per_name'];

 $sql="UPDATE `role` SET `per_name`='$per_name' WHERE  `per_id`=$per_id";
 $result=mysqli_query($connect,$sql);
 if($result){
    echo "updated succesfully";
 }
}
?>