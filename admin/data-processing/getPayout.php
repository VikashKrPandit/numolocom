<?php
include('../include/conn.php');
// DB table to use
$table = 'payout_master';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'title', 'dt' => 1 ),
    array( 'db' => 'amount',  'dt' => 2 ),
    array( 'db' => 'coins',  'dt' => 3 ),
    array( 'db' => 'type',  'dt' => 4 ),
    array( 'db' => 'currency',  'dt' => 5 ),
    array( 'db' => 'status',  'dt' => 6 ),
    // array('defaultContent: <a id="myBtn" class="btn">Edit</a>', "dt" => 3)
);
 
// SQL server connection information
$sql_details = array(
    'user' => $username,
    'pass' => $password,
    'db'   => $db,
    'host' => $servername
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

?>