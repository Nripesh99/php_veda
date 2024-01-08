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
    include '../assets/navbar3.php';
    include '../assets/select_join.php';
    include '../backend/config.php';
    include '../assets/select_three_join.php';
    // include '../assets/select_all.php';
    include '../assets/test_permission.php';
    $id = $_SESSION['Id'];
    $rows = select_join('user', 'role', 'role_id', 'Id', $id, 'role');
    $usertype = implode($rows);

    $row = select('user', 'Id', $id);
    $image_link = $row['Image'];
    //Getting list of permission
    $sql_per = "SELECT roles_permission.permission_id FROM `role` JOIN `roles_permission` ON role.role_id=roles_permission.role_id WHERE role.role_id=1";
    $result_per = mysqli_query($connect, $sql_per);
    $rows = array();
    while ($row_b = mysqli_fetch_assoc($result_per)) {
        $rows[] = $row_b;
        //permission per_id and role_id

    }


    //selecting name of the permission
    $permission_names = array();
    $permission_type=array();
    foreach ($rows as $row_a) {
        $permission_id = $row_a['permission_id'];
        // Query to fetch permission_name from the permission table for each permission_id
        $sql_permission_name = "SELECT per_name, type,slug FROM `permission` WHERE per_id = $permission_id";
        $result_permission_name = mysqli_query($connect, $sql_permission_name);
        if ($row_permission_name = mysqli_fetch_assoc($result_permission_name)) {
            $permissionss[] = $row_permission_name['slug'];
        }
    }
 



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
                            <div>
                                <h5 class="text-center">Granted Permission List</h5>
                                <ul>
                                    <?php foreach ($permissionss as $permission_ist): ?>
                                        <li class=" text-center">
                                            <?php print_r( $permission_ist);
                                                    
                                            ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 text-center">
                            <img src="<?php echo $image_link ?>" alt="Profile" class="profile-image mt-3">
                            <div class="mt-4">
                                <?php if(checkPermission($_SESSION['role_id'], $permission_slug, 'user_edit')){?>

                                    <a href="../frontend/edit_user.php?id=<?php echo $row['Id']; ?>"
                                        class="btn btn-primary">Edit</a>
                                <?php } ?>
                                <?php if(checkPermission($_SESSION['role_id'], $permission_slug, 'user_delete')){?>

                                    <a onclick="confirmDelete(<?php echo $row['Id']; ?>)" class="btn btn-danger mt-2">Delete</a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
                    function confirmDelete(row) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger",
                    },
                    buttonsStyling: false,
                });

                swalWithBootstrapButtons
                    .fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the delete URL
                            window.location.href =
                                "http://localhost:8000/user/backend/role_backend/delete_role.php?id=" + row;
                        }
                    });
                }
    </script>

</body>

</html>