<?php
function delete($table, $column, $value)
{
    include 'dbconfig.php';
    $Id = $_POST['Id'];
    $sql = "DELETE * FROM " . $table . " where " . $column . "='$value'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "Deleted succesfully";

    } else {
        echo "error";
    }
}
?>