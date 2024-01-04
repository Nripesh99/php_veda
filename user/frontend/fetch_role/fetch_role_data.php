<?php   


$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'project1_veda' 
); 
//Database table name
$table='role';
//Table primary key
$primaryKey='role_id';
//database columns
$columns = array( 
    array( 'db' => 'role_id', 'dt' => 'role_id' ), 
    array( 'db' => 'role',  'dt' => 'role' ), 
    array( 'db' => 'role_description',      'dt' => 'role_description' ), 
); 

include('ssp.class.php');
    echo json_encode(
        SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)   
    );

?>