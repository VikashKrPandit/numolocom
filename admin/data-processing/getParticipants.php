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
$table = 'tbl_participants';

// Table's primary key
$primaryKey = 'id';
$conid = $_GET['conid'];
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => '`p`.`id`', 'dt' => 0, 'field' => 'id' ),
    array( 'db' => '`p`.`username`', 'dt' => 1, 'field' => 'username' ),
    // array( 'db' => 'date_created', 'dt' => 2 ),
    array(
        'db'        => '`p`.`date_created`', 
        'field' => 'date_created',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', $d);
        }
    ),
    array( 'db' => '`p`.`ticket_no`', 'dt' => 3, 'field' => 'ticket_no' ),
    array( 'db' => '`p`.`entry_fee`', 'dt' => 4, 'field' => 'entry_fee' ),
    array( 'db' => '`p`.`win_prize`', 'dt' => 5, 'field' => 'win_prize' ),
    array( 'db' => '`p`.`is_dummy`',  'dt' => 6, 'field' => 'is_dummy' ),
    array( 'db' => '`p`.`status`',  'dt' => 7, 'field' => 'status' ),
    array( 'db' => '`c`.`status`',  'dt' => 8, 'as' => 'cstatus', 'field' => 'cstatus' ),
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

// $joinQuery = "FROM `tbl_participants` AS `p` LEFT JOIN `tbl_user` AS `u` ON (`u`.`username` = `p`.`username`)";
$joinQuery = "FROM `tbl_participants` AS `p` LEFT JOIN `tbl_contest` AS `c` ON (`c`.`id` = `p`.`contest_id`)";
$extraWhere = "`p`.`contest_id` = $conid";
// $groupBy = "`u`.`office`";
// $having = "`u`.`salary` >= 140000";

echo json_encode(
    // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere )
);