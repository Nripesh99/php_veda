<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <?php
    // include '../assets/session.php';
    // include '../backend/access.php';
    // check_user_permission($allowed_permission, '5');
    session_start();
    include '../assets/navbar2.php';
    if (!empty($_SESSION['Id'])) {
        include '../backend/config.php';
        $id = $_SESSION['Id'];
        include_once '../assets/select_join.php';
        $Usertype = select_join('user', 'role', 'role_id', 'Id', $id, 'role');
        // var_dump($Usertype);
        // die();  
        $usertype = implode($Usertype);

        if ($usertype === 'super_admin' || $usertype === 'admin') {
            if ($usertype === 'super_admin') {
                header('Location: ../frontend/super_admin.php');
            } else {
                header('Location: ../frontend/admin_admin.php');
            }
        } else {
            header('Location: ../frontend/user_homepage.php');
        }
    }


    ?>
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <form class="border p-4 rounded shadow" action="../backend/login.php" method="post">
                    <h2 class="text-center mb-4">Login</h2>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" id="submit">Login</button>
                    </div>
                </form>
                
                <div class="mb-3 row text-center justify-content-center">
                    <a href="Createuser.php" class="mb-2 text-center">Register</a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>