<?php
include 'config.php';
include '../assets/session.php';
session_start();
if (isset($_POST['submit'])) {

    $id = $_POST['id'];


        $role_id = $_POST['role'];
    
    // var_dump($role_id);
    // die();
    $name = $_POST['username'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    // $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $address = $_POST['address'];
    if ($_FILES['file']['error'] === UPLOAD_ERR_NO_FILE) {
        $sql = "UPDATE user SET Name='$name', Email='$email',Address='$address',role_id='$role_id' WHERE Id=$id";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            $_SESSION['message'] = 'Edited succesfully';
            header('Location: ../assets/redirect.php');
        } else {
            $_SESSION['message'] = 'Failed';
            header('Location:../frontend/redirect.php');
        }
    } else {
        $image_link = $_FILES['file'];
        $file_upload_path = '../assets/upload/';
        $file_name = rand(10, 10000) . rand() . $image_link['name'];
        $file_temp = $image_link['tmp_name'];

        $file = $file_upload_path . $file_name;
        if (move_uploaded_file($file_temp, $file)) {
            echo "";
        } else {
            echo "unable to upload file";
        }
        $sql = "UPDATE user SET Name='$name', Email='$email',Password='$hash_password',Address='$address', Image='$file',role_id='$role_id' WHERE Id=$id";
        // var_dump($sql);
        // die();

        $result = mysqli_query($connect, $sql);
        if ($result) {
            $_SESSION['message'] = 'Edited succesfully';
            header('Location:../frontend/user.php');

        } else {
            $_SESSION['message'] = 'Failed';
            header('Location:../frontend/user.php');
        }

    }
}
