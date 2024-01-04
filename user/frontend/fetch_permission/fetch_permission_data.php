<?php   
 

$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'project1_veda' 
); 
//Database table name
$table='permission';
//Table primary key
$primaryKey='per_id';

//database columns
$columns = array( 
    array( 'db' => 'per_id', 'dt' => 'per_id' ), 
    array( 'db' => 'per_name',  'dt' => 'per_name' ),
    array( 'db' => 'slug',  'dt' => 'slug' ),
    array( 'db' => 'type',  'dt' => 'type' ),

); 

include('../fetch_role/ssp.class.php');
    echo json_encode(
        SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns )   
    );
    die;

?>