<?php
include '../../backend/config.php';
include '../access.php';
check_user_permission($allowed_permission_type, 'permission');
checkUserPermission($allowed_permission_slug,'permission_add');
if (isset($_POST['submit'])) {
    $per_name = $_POST['name'];
    $per_name = strtolower(str_replace(' ', '', $per_name));
    $role_type = $_POST['type'];
    $role_type = strtolower(str_replace(' ', '', $role_type));
    $slug = $role_type . '_' . $per_name;

    $sql = "INSERT INTO `permission` (`per_name`, `slug`, `type`) VALUES ('$per_name', '$slug', '$role_type')";
    
    $result = mysqli_query($connect, $sql);

    if ($result) {
        session_start();
        $_SESSION['message'] = "Added permission";
        header('Location:../../frontend/fetch_permission/index.php');
        exit(); // Make sure to exit after a header redirect
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
