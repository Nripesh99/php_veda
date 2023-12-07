<?php
if (isset($_POST['submit'])) {

   include '../config.php';
   $role_id = $_POST['role_id'];
   $role_name = $_POST['role_name'];
   $role_desc = $_POST['role_desc'];
      

   if (!empty($_POST['checkbox_values'])) {

      $checkboxValues[] = $_POST['checkbox_values'];

      foreach ($checkboxValues as $checkboxvalue) {
         foreach ($checkboxvalue as $permission_id) {
            $permission_id = mysqli_real_escape_string($connect, $permission_id);
            $sql = "INSERT INTO `roles_permission` (`role_id`, `permission_id`) VALUES ('$role_id', '$permission_id')";
            $result = mysqli_query($connect, $sql);
         }
      }
   }
   $sql = "UPDATE `role` SET `role`='$role_name',`role_description`='$role_desc' WHERE  `role_id`=$role_id";
   $result = mysqli_query($connect, $sql);
   if ($result) {
      echo "updated succesfully";
   }

}
?>