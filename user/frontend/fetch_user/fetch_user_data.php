<?php   
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'project1_veda' 
); 
//Database table name
$table='user';
//Table primary key
$primaryKey='Id';

$columns = array( 
    array( 'db' => 'Id', 'dt' => 'id' ), 
    array( 'db' => 'Name',  'dt' => 'Name' ), 
    array( 'db' => 'Email',      'dt' => 'Email' ), 
        // array( 'db' => 'Password',     'dt' => 'Password' ), 
    array( 'db' => 'Address',    'dt' => 'Address' ), 
    array( 'db'=> 'Image', 'dt' =>'Image'),
    array('db'=> 'role_id',  'dt'=>'role_id')
); 

include('ssp.class.php');
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
?>