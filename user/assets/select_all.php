<?php
function selectAll($table, $column='*')
{
    @include '../backend/config.php';
    @include '../../backend/config.php';

    //COUNT[id]
    $sql = "SELECT $column FROM " . $table;
    $result = mysqli_query($connect, $sql);
    if(!empty($result)){

        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }
    // $row = mysqli_fetch_assoc($result);
    //store the value of the database in the row        

}
?>