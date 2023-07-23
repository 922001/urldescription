<?php
// Database connection info 
$dbDetails = array(

    'user' => 'root',
    'pass' => '',
    'db' => 'creslms',
    'host' => 'localhost'
);

// DB table to use 
$table = 'user_log';

// Table's primary key 
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'reg_no', 'dt' => 1),
    array('db' => 'logged_time', 'dt' => 2),
);

// Include SQL query processing class 
require 'ssp.class.php';

// Output data as json format 
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);