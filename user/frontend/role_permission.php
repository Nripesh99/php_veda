<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<?php
include '../assets/session.php';
include '../backend/access.php';
include '../assets/navbar2.php';

check_user_permission($allowed_permission, '[3,4]');
?>

<body>
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 class="text-center">Roles and Permission Table</h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <form method="post" action="../backend/role_permission/test.php">
                        <table width="100%" class="table table-hover" id="dataTables-example">
                            <thead>
                                <th>Role Name</th>
                                <?php $permissions = permission();
                                foreach ($permissions as $value => $key)
                                    echo '<th>' . $value . '</th>'
                                        ?>
                                    <!-- <th>Action</th> -->
                                </thead>
                                <tbody>
                                <?php role('role', $permissions); ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

<?php
// //counting number of roles
// include '../backend/config.php';
// $sql="SELECT COUNT(role_id) FROM role";
// $result=mysqli_query($connect,$sql);
// $role_count=mysqli_fetch_assoc($result);
// //Counting number of permission
// $sqli="SELECT COUNT(permission_id) FROM permission";
// $results=mysqli_query($connect,$sqli);
// $permission_count=mysqli_fetch_assoc($results);
function permission()
{
    $data = array();
    include '../backend/config.php';
    $sql = "SELECT * FROM permission";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['per_name']] = $row['per_id'];
    }
    return $data;
}

function role($table, $permissions)
{
    include '../backend/config.php';
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row["role"] . '</td>';
        foreach ($permissions as $perName => $perId) {
            echo '<td>  </td>';
        }
    }
}
// for($i=0; $i<$permission_count;$i++){
//     echo $i;
// }
?>