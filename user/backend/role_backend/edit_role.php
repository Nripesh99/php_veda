<?php 
if(isset($_POST['submit'])){

 include '../config.php';
 $role_id=$_POST['role_id'];
 $role_name=$_POST['role_name'];
 $role_desc=$_POST['role_desc'];
 $sql="UPDATE `role` SET `role`='$role_name',`role_description`='$role_desc' WHERE  `role_id`=$role_id";
 $result=mysqli_query($connect,$sql);
 if($result){
    echo "updated succesfully";
 }

}
?>