<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
</head>

<body>
    <?php
    include '../assets/session.php';
    include '../backend/access.php';
    check_user_permission($allowed_permission, '3');
    include '../assets/navbar2.php'; ?>
    <button class="btn btn-primary " onclick="history.back()">
        <i class="bi bi-arrow-return-left"></i> Go Back
    </button>
    <?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        echo '<div class="container mt-3">';
        echo '<div id="messages" class="alert alert-dark text-center">' . $message . '</div>';
        echo '</div>';

    }
    ?>

    <script>
        // Automatically remove the message after 30 seconds
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(function () {
                var messageElement = document.getElementById("messages");
                if (messageElement) {
                    messageElement.style.display = "none";
                }
            }, 3000); // 30 seconds
        });
    </script>
    <tr>
        <?php

        include '../backend/config.php';
        require_once('../assets/select_all.php');

        include '../backend/config.php';
        // include '../assets/select_all.php';
        $row = selectAll('role');
        // include '../assets/session.php';
        // session_start();
        // if(empty($_SESSION['Id'])){
        //    include '../'
        // } 
        
        ?>
    <tr>

        </div>
        <div class="content">
            <div class="container">
                <div class="page-title">
                    <h3>User Roles
                        <a href="add_role.php" class="btn btn-sm btn-outline-primary float-end btn-lg"><i
                                class="fas fa-plus-circle "></i> Add</a>
                    </h3>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <table width="100%" class="table table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Role Name</th>
                                    <th>Role Desc</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($row as $rows) {
                                    echo '<tr>';
                                    echo '<td>' . $counter . '</td>';
                                    echo '<td>' . $rows['role'] . '</td>';
                                    echo '<td>' . $rows['role_description'] . '</td>';
                                    echo '<td>';
                                    echo '<a href="edit_role.php?id=' . $rows['role_id'] . '" class="btn btn-outline-info btn-rounded mr-2"><i class="fas fa-toggle-on pr-2"></i>Edit</a>';
                                    echo '<a href="#" class="btn btn-outline-danger btn-rounded ml-2" onclick="confirmDelete(' . $rows['role_id'] . ')"><i class="fas fa-toggle-on"></i>Delete</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                    $counter++;
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>


</html>
<script>
    function confirmDelete(roleId) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the delete URL
                window.location.href = '../backend/role_backend/delete_role.php?id=' + roleId;
            }
        });
    }
</script>