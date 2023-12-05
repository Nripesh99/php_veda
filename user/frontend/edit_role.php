<?php
include '../backend/config.php';
$id = $_GET['id'];
include '../assets/selectfromuser.php';

$row = select('role', 'role_id', $id);
// var_dump($row);
// die();
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
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <form class="border p-4 rounded shadow" action="../backend/role_backend/edit_role.php" method="POST">
                    <h2 class="text-center mb-4">Edit Role</h2>
                    <div class="mb-3">
                        <!-- <label for="username" class="form-label"> Role Name:</label> -->
                        <input type="text" class="form-control" name="role_id" id="role_id" value=<?php echo $row['role_id'] ?> required hidden>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label"> Role Name:</label>
                        <input type="text" class="form-control" name="role_name" id="role_name" value=<?php echo $row['role'] ?> required>
                    </div>

                    <div class="mb-3 ">
                        <label for="description" class="form-label">Role Description:</label>
                        <input type="text" class="form-control" name="role_desc" id="role_desc" value=<?php echo $row['role_description']?> required>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Edit Role</button>
                    </div>

</body>

</html>