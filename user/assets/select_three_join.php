<?php

function select_three_join($role, $permission, $roles_permission, $role_id, $per_id, $pers_id)
{
    include '../backend/config.php';
    $sql = "SELECT * FROM `$role`
            JOIN `$roles_permission` ON `$role`.`$role_id` = `$roles_permission`.`$role_id`
            JOIN `$permission` ON `$permission`.`$per_id` = `$roles_permission`.`$pers_id`";

    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die("Error in SQL query: " . mysqli_error($connect));
    }

    $row = mysqli_fetch_assoc($result);
    return $row;


}
?>
