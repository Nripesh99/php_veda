<?php
include 'config.php';
session_start();
$id = $_SESSION['Id'];
if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $sql = "UPDATE user SET Name='$name', Email='$email',Password='$hash_password',Address='$address' WHERE Id=$id";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "Updated Succesfully";

    } else {
        echo "Couldn't update";
    }
}
