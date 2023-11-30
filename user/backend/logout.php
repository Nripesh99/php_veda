<?php
session_start();
session_destroy(); 
// var_dump($_SESSION['Id']); 
header('location:../frontend/loginfile.php');
?>