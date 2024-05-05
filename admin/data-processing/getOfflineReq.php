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
$table = 'tbl_offline_plyments';

// Table's primary key
$primaryKey = 'id';
// $conid = $_GET['conid'];
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => '`O`.`id`', 'dt' => 0, 'field' => 'id' ),
    array( 'db' => '`O`.`user_id`', 'dt' => 1, 'field' => 'user_id' ),
    array( 'db' => '`U`.`username`', 'dt' => 2, 'field' => 'username' ),
    /*array(
        'db'        => '`p`.`date_created`', 
        'field' => 'date_created',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', $d);
        }
    ),*/
    array( 'db' => '`O`.`transaction_id`', 'dt' => 3, 'field' => 'transaction_id' ),
    array( 'db' => '`O`.`amount`', 'dt' => 4, 'field' => 'amount' ),
    array( 'db' => '`O`.`wallet`',  'dt' => 5, 'field' => 'wallet' ),
    array( 'db' => '`O`.`note`',  'dt' => 6, 'field' => 'note' ),
    array( 'db' => '`O`.`created_at`', 'dt' => 7, 'field' => 'created_at' ),
    array( 'db' => '`O`.`status`',  'dt' => 8, 'field' => 'status' ),
    // array( 'db' => '`c`.`status`',  'dt' => 8, 'as' => 'cstatus', 'field' => 'cstatus' ),
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

$joinQuery = "FROM `tbl_offline_plyments` AS `O` LEFT JOIN `tbl_user` AS `U` ON (`U`.`id` = `O`.`user_id`)";
// $extraWhere = "`p`.`contest_id` = $conid";
// $groupBy = "`u`.`office`";
// $having = "`u`.`salary` >= 140000";

echo json_encode(
    // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
);