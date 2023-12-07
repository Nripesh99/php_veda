<?php
function selectAll($table)
{
    include '../backend/config.php';
    
    $sql = "SELECT * FROM " . $table;
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