<?php 
if(isset($_POST['submit'])){
  include '../access.php';
check_user_permission($allowed_permission_type, 'permission');
checkUserPermission($allowed_permission_slug,'permission_edit');

 include '../config.php';

$per_id=$_POST['per_id'];
 $per_name=$_POST['per_name'];

 $sql="UPDATE `permission` SET `per_name`='$per_name' WHERE  `per_id`=$per_id";
 $result=mysqli_query($connect,$sql);
 if($result){
   $_SESSION['message']='updated succesfully';
   header('Location:../../frontend/fetch_permission/index.php');
 }
}
?>