<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<?php
include '../assets/session.php';
include '../backend/access.php';
include '../assets/navbar3.php';
check_user_permission($allowed_permission_type, 'role');
checkUserPermission($allowed_permission_slug, 'role_add');
?>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <form class="border p-4 rounded shadow" action="../backend/role_backend/create_role.php" method="POST">
                <h2 class="text-center mb-4">Add Role</h2>

                <div class="mb-3">
                    <label for="username" class="form-label"> Role Name:</label>
                    <input type="text" class="form-control" name="role_name" id="role_name" required>
                </div>

                <div class="mb-3 ">
                    <label for="description" class="form-label">Role Description:</label>
                    <input type="text" class="form-control" name="role_desc" id="role_desc" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Add Role</button>
                </div>



</html>