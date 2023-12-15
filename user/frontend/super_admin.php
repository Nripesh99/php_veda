<?php
include '../assets/session.php';
include '../assets/select_join.php';

include '../backend/config.php';
$id = $_SESSION['Id'];
$rows = select_join('user', 'role', 'role_id', 'Id', $id, 'role');
$usertype = implode($rows);
if ($usertype != 'super_admin') {
    header('Location: ../assets/redirect.php');
}

include '../backend/config.php';


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
    <?= include '../assets/navbar2.php';?>
</div>
        <?php
        include '../backend/userview.php'; ?>


</body>

</html>