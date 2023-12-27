<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/2.3.7/mini-default.min.css">
</head>

</head>

<body>
    <tr>
    <tr>
        <?php
        include '../assets/session.php';

        include '../backend/access.php';
        check_user_permission($allowed_permission, '5');
        include '../assets/navbar2.php'; 
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
        <div class="content">
            <div class="container">
                <div class="page-title">
                    <h3>User Roles
                        <a href="add_user.php" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-plus-circle"></i> Add</a>

                    </h3>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <?php



                        ?>

                    </div>
                    <?php

                    ?>
                    <table width="100%" class="table table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th> Name</th>
                                <th> Email</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../backend/user.php';
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