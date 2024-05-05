<?php

include('../include/conn.php');
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'tbl_user';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array( 'db' => '`u`.`id`', 'dt' => 0, 'field' => 'id' ),
    array( 'db' => '`u`.`username`', 'dt' => 1, 'field' => 'username' ),
    array( 'db' => '`u`.`acc_name`', 'dt' => 2, 'field' => 'acc_name' ),
    array( 'db' => '`u`.`acc_no`', 'dt' => 3, 'field' => 'acc_no' ),
    array( 'db' => '`u`.`ifsc_code`', 'dt' => 4, 'field' => 'ifsc_code' ),
    array( 'db' => '`u`.`pan_no`', 'dt' => 5, 'field' => 'pan_no' ),
    array( 'db' => '`u`.`proof_copy`',  'dt' => 6, 'field' => 'proof_copy' ),
    array( 'db' => '`u`.`acc_status`',  'dt' => 7, 'field' => 'acc_status' )
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

// require( 'ssp.class.php' );
require('sspCustom.class.php' );

$joinQuery = "FROM `tbl_user` AS `u`";
$extraWhere = "`u`.`is_dummy` = 0";
// $groupBy = "`u`.`office`";
// $having = "`u`.`salary` >= 140000";

echo json_encode(
    // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere )
);