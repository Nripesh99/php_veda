<?php
// Logged In UserData || Session Check
if (!empty($_SESSION['Id'])) {
    $id=$_SESSION['Id'];    
    include_once '../backend/config.php';
} else {
    header('Location:../backend/logout.php');
}

