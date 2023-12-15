<?php
include '../assets/session.php';
include '../assets/navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <form class="border p-4 rounded shadow" action="../backend/permission_backend/add_permission.php" method="POST">
                <h2 class="text-center mb-4">Add Role</h2>

                <div class="mb-3">
                    <label for="username" class="form-label"> Permission Name:</label>
                    <input type="text" class="form-control" name="per_name" id="per_name" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Add Permission</button>
                </div>

                <body>

                </body>

</html>