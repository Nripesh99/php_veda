<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include '../backend/access.php';
    check_user_permission($allowed_permission_type, 'user');
    checkUserPermission($allowed_permission_slug, 'user_add');
    ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <form class="border p-4 rounded shadow" action="../backend/user_create.php" method="POST"  enctype="multipart/form-data">
                <h2 class="text-center mb-4">User Registration</h2>

                <div class="mb-3">
                    <label for="username" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>


                <div class="mb-3">
                    <label for="passwords" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="passwords" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>  

                <div class="mb-3">
                    <label for="file" class="form-label">Upload photo:</label>
                    <input type="file" class="form-control" name="file" id="file" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
