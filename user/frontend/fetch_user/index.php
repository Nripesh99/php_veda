<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/2.3.7/mini-default.min.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    include '../../assets/session.php';
    include '../../backend/access.php';
    include '../../assets/test_permission.php';
    check_user_permission($allowed_permission_type, 'user');
    include '../../assets/navbar3.php'; ?>
    <?php
    ?>
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
    <button class="btn btn-primary " onclick="history.back()">
        <i class="bi bi-arrow-return-left"></i> Go Back
    </button>
    <h3 class='text-center'>User
        <?php if (checkPermission($role_id, $permission_slug, 'user_add')) { ?>

            <a href="../Createuser.php" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-plus-circle"></i>
                Add</a>
        <?php } ?>

    </h3>

    <table width="100%" class="table table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>S.no</th>

                <!-- <th>ID.No</th> -->
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Image</th>
                <th>role_id</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $("#dataTables-example").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "http://localhost:8000/user/frontend/fetch_user/fetch_user_data.php",
                    dataSrc: "data",
                },
                columns: [
                    { data: null },
                    // { data: "id" },
                    { data: "Name" },
                    { data: "Email" },
                    { data: "Address" },
                    {
                        data: "Image",
                        render: function (data, type, row) {
                            return (
                                '<img src="../' +
                                data +
                                '" alt="Image" style="width: 100px; height: 100px;" />'
                            );
                        },
                    },
                    { data: "role_id" },
                    {
                        data: "id",
                        render: function (data, type, row) {
                            var editButton = '';
                            var deleteButton = '';

                            <?php if (checkPermission($role_id, $permission_slug, 'user_edit')) { ?>
                                editButton = '<button onclick="editRow(' + data + ')">Edit</button>';
                            <?php } else { ?>
                                editButton = '';
                            <?php } ?>

                            <?php if (checkPermission($role_id, $permission_slug, 'user_delete')) { ?>
                                deleteButton = '<button onclick="confirmDelete(' + data + ')">Delete</button>';
                            <?php } else { ?>
                                deleteButton = '';
                            <?php } ?>

                            return editButton + ' ' + deleteButton;
                        },
                    },
                ],
                rowCallback: function (row, data, dataIndex) {
                    // Set the serial number in the first column
                    $(row).find('td:eq(0)').text(dataIndex + 1);
                },
            });
        });

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
                            "http://localhost:8000/user/backend/deleteuser.php?id=" + row;
                    }
                });
        }
        function editRow(row) {
            window.location.href = "http://localhost:8000/user/frontend/edit_user.php?id=" + row;
        }

    </script>
</body>

</html>