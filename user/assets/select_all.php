<?php
function selectAll($table)
{
    include '../backend/config.php';
    $sql = "SELECT * FROM " . $table;
    $result = mysqli_query($connect, $sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}
?>