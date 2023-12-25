<?php
// include '../assets/navbar.php';
include 'config.php';
// include '../assets/session.php';
if(isset($_POST['submit'])){
    $Name=$_POST['username'];
    $Email=$_POST['email'];
    // var_dump($Name);
    // die();
    $Password=$_POST['password'];
    $hash_password=password_hash($Password, PASSWORD_DEFAULT);
    $Address=$_POST['address'];
    $Usertype="user";
    $image_link = $_FILES['file'];
    $file_upload_path = '../assets/upload/';
    $file_name = rand(10,10000).rand().$image_link['name'];
    $file_temp = $image_link['tmp_name'];
    $user_role=1;
    
    $file=$file_upload_path.$file_name;
    if(move_uploaded_file($file_temp, $file)){
        echo "";
    }
    else{
        echo "unable to upload file";
        die();
    } 

    $sql="INSERT INTO `user`(`Name`, `Email`, `Password`, `Address`,  `Image`,`role_id`) VALUES ('$Name','$Email','$hash_password','$Address', '$file','$user_role')";
    $result=mysqli_query($connect,$sql);
    if($result){
        
        echo "user created succesfully";
        header('Location:../frontend/loginfile.php');
    }
    else{
        echo"failed";
    }

    }
?>