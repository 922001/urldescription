<?php
// Database connection info 
$dbDetails = array(

    'user' => 'root',
    'pass' => '',
    'db' => 'creslms',
    'host' => 'localhost'
);

// DB table to use 
$table = 'activity_log';

// Table's primary key 
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array('db' => 'date', 'dt' => 0),
    array('db' => 'name', 'dt' => 1),
    array('db' => 'action', 'dt' => 2),
);

// Include SQL query processing class 
require 'ssp.class.php';

// Output data as json format 
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);