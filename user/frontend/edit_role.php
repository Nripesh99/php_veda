<?php
include '../assets/session.php';
include '../backend/access.php';
include '../assets/navbar3.php';
check_user_permission($allowed_permission_type, 'role');
checkUserPermission($allowed_permission_slug, 'role_edit');
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
    <button class="btn btn-primary " onclick="history.back()">
        <i class="bi bi-arrow-return-left"></i> Go Back
    </button>
    <div class="container-fluid bt-5 mb-5 custom-container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <form class="border p-4 rounded shadow form-control" action="../backend/role_backend/edit_role.php"
                    method="POST">
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
                    <?php
                    $rolePermissions = []; // Associative array to store permissions for each role
                    
                    foreach ($rows as $per) {
                        // Extract role and permission from the 'slug'
                        //changing from string to array using parts
                        $parts = explode('_', $per['slug']);
                        $role = ucfirst($parts[0]); // Capitalize the first letter
                    
                        // Initialize an empty array for the role if it doesn't exist
                        if (!isset($rolePermissions[$role])) {
                            $rolePermissions[$role] = [];
                        }

                        // Add the permission to the role's array
                        //slug bata aucha value
                        $rolePermissions[$role][] = [
                            'name' => $per['per_name'],
                            'id' => $per['per_id']
                        ];
                    }
                    ?>
                    <div class="container mt-4">
                        <div class='text-center'>
                            <div class="checkbox">
                            <label>
                                <input type="checkbox" class="btn btn-lg btn-toggle" id="toggleAll"
                                    onclick="toggleSelectAll()"> Select All Categories
                            </label>
                            </div>  
                        </div>
                        <div class="row">
                            <?php foreach ($rolePermissions as $role => $permissions): ?>
                                <div class="col-sm-4 mb-3">
                                    <div class="card">
                                        <label for="Add Permission" class="form-label">
                                            <strong>
                                                <?= $role ?>:
                                            </strong>
                                        </label>
                                        <label>
                                            <!-- <input type="checkbox" class="role-toggle" data-role="<?= $role ?>"
                            onclick="toggleSelectAll('<?= $role ?>')"> Toggle Select All
                    </label> -->
                                            <br>
                                            <?php foreach ($permissions as $permission): ?>
                                                <?php $isChecked = in_array($permission['id'], $perm_id); ?>
                                                <div>
                                                    <?= "{$permission['name']} <input type='checkbox' name='checkbox_values[]' value='{$permission['id']}' " . ($isChecked ? 'checked' : '') . "> "; ?>
                                                </div>
                                            <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <script>
                        function toggleSelectAll(role) {
                            var toggleCheckbox = document.getElementById('toggleAll');
                            var checkboxes;

                            if (role) {
                                checkboxes = document.querySelectorAll(`input[name="checkbox_values[]"][data-role="${role}"]`);
                            } else {
                                checkboxes = document.querySelectorAll('input[name="checkbox_values[]"]');
                            }

                            checkboxes.forEach(function (checkbox) {
                                checkbox.checked = toggleCheckbox.checked;
                            });
                        }
                    </script>





                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" id="submit">Edit Role</button>
                    </div>

                    <!-- </body>

</html> -->