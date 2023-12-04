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
    <tr>
        <?php
        include '../backend/config.php';
        include '../assets/select_all.php';
        $row=selectAll('role');
        // var_dump($row);
        // die();
        echo '<td>'. $role . '</td>';
        echo '<td>Active</td>';
        echo '<td class="text-end">';
        echo '<a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>';
        echo ' <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>';
        echo '<a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>';
        echo ' </td>';
        echo '</tr>';
        ?>
    <tr>
        <!-- <?Php include '../assets/navbar.php'; ?> -->
        <div class="content">
            <div class="container">
                <div class="page-title">
                    <h3>User Roles
                        <a href="roles.html" class="btn btn-sm btn-outline-primary float-end"><i
                                class="fas fa-plus-circle"></i> Add</a>
                        <a href="super_admin.php" class="btn btn-sm btn-outline-info float-end me-1"><i
                                class="fas fa-angle-left"></i> <span class="btn-header">Return</span></a>
                    </h3>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <table width="100%" class="table table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Role Name</th>
                                    <th>End User</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    echo '<td>Administrator</td>';
                                    echo '<td>Active</td>';
                                    echo '<td class="text-end">';
                                    echo '<a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>';
                                    echo ' <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>';
                                    echo '<a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>';
                                    echo ' </td>';
                                    echo '</tr>';
                                    ?>
                                <tr>
                                    <td>Manager</td>
                                    <td>Active</td>
                                    <td class="text-end">
                                        <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i
                                                class="fas fa-toggle-on"></i></a>
                                        <a href="" class="btn btn-outline-info btn-rounded"><i
                                                class="fas fa-pen"></i>add</a>
                                        <a href="" class="btn btn-outline-danger btn-rounded"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Writer</td>
                                    <td>Active</td>
                                    <td class="text-end">
                                        <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i
                                                class="fas fa-toggle-on"></i></a>
                                        <a href="" class="btn btn-outline-info btn-rounded"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-outline-danger btn-rounded"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td>Disabled</td>
                                    <td class="text-end">
                                        <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i
                                                class="fas fa-toggle-on"></i></a>
                                        <a href="" class="btn btn-outline-info btn-rounded"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-outline-danger btn-rounded"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Audit</td>
                                    <td>Active</td>
                                    <td class="text-end">
                                        <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i
                                                class="fas fa-toggle-on"></i></a>
                                        <a href="" class="btn btn-outline-info btn-rounded"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-outline-danger btn-rounded"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contributor</td>
                                    <td>Active</td>
                                    <td class="text-end">
                                        <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i
                                                class="fas fa-toggle-on"></i></a>
                                        <a href="" class="btn btn-outline-info btn-rounded"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-outline-danger btn-rounded"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>Active</td>
                                    <td class="text-end">
                                        <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i
                                                class="fas fa-toggle-on"></i></a>
                                        <a href="" class="btn btn-outline-info btn-rounded"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-outline-danger btn-rounded"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
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