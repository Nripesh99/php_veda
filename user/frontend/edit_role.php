<?php
include '../assets/session.php';
include '../backend/access.php';
include '../assets/navbar2.php';
check_user_permission($allowed_permission, '5');
include '../backend/config.php';
$id = $_GET['id'];
$row = select('role', 'role_id', $id);
//selecting all permission
$rows = selectAll('permission');
$sqlis = "SELECT permission_id FROM roles_permission where role_id=$id";

$resulr = mysqli_query($connect, $sqlis);
$perm_id = array();
while ($result = mysqli_fetch_assoc($resulr)) {
    $perm_id[] = $result['permission_id'];
}
?>
<!DOCTYPE html>
<html lang="en">



<body>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <form class="border p-4 rounded shadow form-control" action="../backend/role_backend/edit_role.php" method="POST">
                    <h2 class="text-center mb-4">Edit Role and Permission</h2>
                    <div class="mb-3">
                        <!-- <label for="username" class="form-label"> Role Name:</label> -->
                        <input type="text" class="form-control" name="role_id" id="role_id" value=<?php echo $row['role_id'] ?> required hidden>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label"> Role Name:</label>
                        <input type="text" class="form-control" name="role_name" id="role_name" value=<?php echo $row['role'] ?> required>
                    </div>

                    <div class="mb-3 ">
                        <label for="description" class="form-label">Role Description:</label>
                        <input type="text" class="form-control" name="role_desc" id="role_desc" value=<?php echo $row['role_description'] ?> required>
                    </div>
                    
                    <div class="mb-3 ">
                        <label for="Add Permission" class="form-label">Permission:</label><br>
                        <?php
                        // $perm_id = is_array($perm_id) ? $perm_id : [];  
                        foreach ($rows as $per) {
                            echo $per['per_name'];


                            $isChecked = in_array($per['per_id'], $perm_id);
                            echo '<input type="checkbox" name="checkbox_values[]" value="' . $per['per_id'] . '" ' . ($isChecked ? 'checked' : '') . '><br>';
                        }

                        ?>


                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" id="submit">Edit Role</button>
                    </div>

<!-- </body>

</html> -->