<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body>
    <tr>
        <?php
        include '../backend/config.php';
        include '../assets/select_all.php';
        $row = selectAll('permission');
        // var_dump($row);
        // die();
        ?>
    <tr>
        <!-- <?Php include '../assets/navbar.php'; ?> -->
        <div class="content">
            <div class="container">
                <div class="page-title">
                    <h3 class="text-center">Permission Table
                        <a href="add_per.php" class="btn btn-sm btn-outline-primary float-end"><i
                                class="fas fa-plus-circle"></i> Add</a>

                    </h3>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <table width="100%" class="table table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Permission Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($row as $rows) {
                                    echo '<tr>';
                                    echo '<td>' . $counter . '</td>';
                                    echo '<td>' . $rows['per_name'] . '</td>';
                                    // echo '<td>' . $rows['role_description'] . '</td>';
                                    echo '<td>';
                                    echo '<a href="edit_per.php?id=' . $rows['per_id'] . '" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i>Edit</a>';
                                    echo '<a href="../backend/permission_backend/delete_permission.php?id=' . $rows['per_id'] . '" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen">Delete</i></a>';
                                    // echo '<a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>';
                                    echo ' </td>';
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