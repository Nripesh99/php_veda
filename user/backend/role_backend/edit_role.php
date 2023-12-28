<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

   include '../config.php';
   $role_id = $_POST['role_id'];
   $role_name = $_POST['role_name'];
   $role_desc = $_POST['role_desc'];
   if (!empty($_POST['checkbox_values'])) {

      $checkbox = $_POST['checkbox_values'];
      // var_dump($checkbox);
      // die();
   }
   //first Empty the whole database and then again add the permission to the role
   $sqlDelete = "DELETE FROM roles_permission WHERE role_id = $role_id";
   $resultDelete = mysqli_query($connect, $sqlDelete);
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
      $_SESSION['message'] = "updated role  succesfully";
      // print_r ($_SESSION);
      header('Location: ../../frontend/fetch_role/index.php');
   }

}
?>