<?php
session_start();
include '../assets/navbar.php';
include '../assets/footer.php';
include '../backend/config.php';
include '../assets/session.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

    <?php include '../backend/userview.php'; ?>


    </div>
</body>

</html>