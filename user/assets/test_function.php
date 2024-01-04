<?php
@include '../../backend/config.php';
@include '../backend/config.php';
@include 'session.php';
@include 'selectfromuser.php';
@include_once 'select_all.php';

$id = $_SESSION['Id'];
$role_id = $_SESSION['role_id'];

$permission_slug = array();
$permission = selectAll('permission', 'per_id');
$sql = "SELECT permission_id FROM roles_permission WHERE role_id=$role_id";
$result = mysqli_query($connect, $sql);

while ($rows = mysqli_fetch_assoc($result)) {
    $allowed_permission[] = $rows['permission_id'];
}

foreach ($allowed_permission as $allowedPermission) {
    $sql_2 = "SELECT `slug`
        FROM `permission`
        JOIN `roles_permission` ON roles_permission.permission_id = permission.per_id
        WHERE roles_permission.role_id = $role_id AND permission.per_id = $allowedPermission";
    $result_2 = mysqli_query($connect, $sql_2);
    $slug_value = mysqli_fetch_assoc($result_2)['slug'];

    if ($slug_value !== null) {
        $permission_slug[] = $slug_value;
    }
}
function checkPermission($role_id, $permission_slug)
{
    @include '../backend/config.php';
    $rolePermissionExists = checkRolePermissionRelationship($role_id, $permission_slug);
    if ($rolePermissionExists) {
        return true;
    }
}

// Function to check the relationship between role and permissions
function checkRolePermissionRelationship($role_id, $permission_slug)
{
    // Include the configuration file
    @include '../backend/config.php';

    // Check if the permission slug array is empty
    if (empty($permission_slug)) {
        return false;
    }

    $permissions = [];

    // Escape and quote each permission slug
    foreach ($permission_slug as $slug) {
        if (is_string($slug)) {
            @include '../../backend/config.php';
            $permissions[] = "'" . mysqli_real_escape_string($connect, $slug) . "'";
        }
    }

    // Implode the escaped and quoted permission slugs
    $permissionsString = implode(',', $permissions);

    // Construct the SQL query to check role-permission relationship
    $sql = "SELECT COUNT(DISTINCT permission.slug) as count
            FROM roles_permission
            JOIN permission ON roles_permission.permission_id = permission.per_id
            WHERE roles_permission.role_id = $role_id AND permission.slug IN ($permissionsString)";

    // Execute the query
    $result = mysqli_query($connect, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        return $count > 0;
    } else {
        // Handle database query error
        die("Error checking role-permission relationship: " . mysqli_error($connect));
    }
}
$a = checkPermission($role_id, $permission_slug);
var_dump($a);
die();
// Usage example:

?>