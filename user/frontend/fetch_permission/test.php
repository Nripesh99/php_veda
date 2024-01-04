<?php
@include '../../backend/config.php';
@include '../backend/config.php';
@include '../../assets/session.php';
// @include '../../assets/selectfromuser.php';
@include_once '../../assets/select_all.php';
// @include '../../assets/var_dump.php';

$id = $_SESSION['Id'];
$role_id = $_SESSION['role_id'];

$permission_slug = array();
$permission_type = array();
$permission_name = array();

$permission = selectAll('permission', 'per_id');
$sql = "SELECT permission_id FROM roles_permission WHERE role_id=$role_id";
$result = mysqli_query($connect, $sql);

while ($rows = mysqli_fetch_assoc($result)) {
    $allowed_permission[] = $rows['permission_id'];
}

foreach ($allowed_permission as $allowedPermission) {
    $sql_2 = "SELECT `slug`, `type`, `per_name`
        FROM `permission`
        JOIN `roles_permission` ON roles_permission.permission_id = permission.per_id
        WHERE roles_permission.role_id = $role_id AND permission.per_id = $allowedPermission";
    $result_2 = mysqli_query($connect, $sql_2);
    $value = mysqli_fetch_assoc($result_2);

    // dump($value);

    $permission_slug[] = $value['slug'];
    $permission_type[] = $value['type'];
    $permission_name[] = $value['per_name'];

}
function checkPermission($role_id, $permission_slug, $page_slug)
{
    // Include the configuration file
    @include '../../backend/config.php';

    // Check if the permission slug array is empty
    if (empty($permission_slug)) {
        return false;
    }

    $permissions = [];

    // Escape and quote each permission slug
    foreach ($permission_slug as $slug) {

        if ($slug === $page_slug) {
            return true;
        }
    }

    // Implode the escaped and quoted permission slugs
    // $permissionsString = "'" . implode("','", $permission_slug) . "'";
    // // Construct the SQL query to check role-permission relationship
    // $sql = "SELECT COUNT(DISTINCT permission.slug) as count
    //     FROM roles_permission
    //     JOIN permission ON roles_permission.permission_id = permission.per_id
    //         WHERE roles_permission.role_id = $role_id AND permission.slug IN ($permissionsString)";

    // // dump($sql);

    // // Execute the query
    // $result = mysqli_query($connect, $sql);

    // if ($result) {
    //     $row = mysqli_fetch_assoc($result);
    //     $count = $row['count'];

    //     return $count > 0;
    // } else {
    //     // Handle database query error
    //     die("Error checking role-permission relationship: " . mysqli_error($connect));
    // }

    return false;
}

// $a = checkPermission($role_id, $permission_slug, 'role_edit');
// Usage example:

?>