<?php
include '../../backend/config.php';
session_start();
include '../access.php';
check_user_permission($allowed_permission_type, 'role');
checkUserPermission($allowed_permission_slug,'role_delete');
// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $role_id = $_GET['id'];

    // Prepare and bind the statement
    $sql = "DELETE FROM role WHERE role_id = ?";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'i', $role_id);

        try {
            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['message']= "Deleted successfully";
                header('Location:../../frontend/fetch_role/index.php');
                exit(); // Important to exit after redirection
            } else {
                $_SESSION['message']= "Error deleting role: " . mysqli_error($connect);
                header('Location:../../frontend/fetch_role/index.php');
                exit(); // Important to exit after redirection
            }

        } catch (mysqli_sql_exception $e) {
            // Handle foreign key constraint error
            if ($e->getCode() == 1451) {
                $_SESSION['message']= "Cannot delete the role because it is associated with one or more users.";
                header('Location:../../frontend/fetch_role/index.php');
                exit(); // Important to exit after redirection
            } else {
                // Handle other database errors
                $_SESSION['message']= "Error: " . $e->getMessage();
                header('Location:../../frontend/fetch_role/index.php');
                exit(); // Important to exit after redirection
            }
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['message']= "Error preparing statement: " . mysqli_error($connect);
        header('Location:../../frontend/fetch_role/index.php');
                exit(); // Important to exit after redirection
    }
} else {
    $_SESSION['message']= "Invalid role ID.";
    header('Location:../../frontend/fetch_role/index.php');
                exit(); // Important to exit after redirection
}
?>
