<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .profile-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <?php
    include '../assets/session.php';
    include '../assets/selectfromuser.php';
    include '../assets/navbar2.php';
    include '../assets/select_join.php';
    include '../backend/config.php';
    include '../assets/select_three_join.php';
    $id = $_SESSION['Id'];
    $rows = select_join('user', 'role', 'role_id', 'Id', $id, 'role');
    $usertype = implode($rows);
    $row = select('user', 'Id', $id);
    $image_link = $row['Image'];
    $permissions = select_join('role', 'roles_permission', 'role_id', 'role.role_id', '1', 'permission_id');
    $permission = array();
    foreach ($permissions as $permission_1) {

        $permission = select('permission', 'per_id', $permission_1, 'per_name');
    }
    // var_dump($permission);
    // die();
    



    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-container">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3 class="mb-4">User Profile</h3>
                            <p class="h5">Name:
                                <?php echo $row['Name'] ?>
                            </p>
                            <p class="h5">Address:
                                <?php echo $row['Address'] ?>
                            </p>
                            <p class="h5">Email:
                                <?php echo $row['Email'] ?>
                            </p>
                            <br>
                            <div >
                                <h5 class="text-center">Granted Permission List</h5>
                                <ul >
                                    <?php foreach ($permission as $permissionList): ?>
                                        <li class=" text-center">
                                            <?php echo $permissionList; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 text-center">
                            <img src="<?php echo $image_link ?>" alt="Profile" class="profile-image mt-3">
                            <div class="mt-4">
                                <a href="../frontend/edit_user.php?id=<?php echo $row['Id']; ?>"
                                    class="btn btn-primary">Edit</a>
                                <!-- <a href="../backend/deleteuser.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger mt-2">Delete</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>