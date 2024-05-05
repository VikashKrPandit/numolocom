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
$table = 'tbl_transaction';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => '`t`.`id`', 'dt' => 0, 'field' => 'id' ),
	array( 'db' => '`u`.`username`',     'dt' => 1, 'field' => 'username'),
	array( 'db' => '`t`.`order_id`',  'dt' => 2, 'field' => 'order_id' ),
	array( 'db' => '`t`.`payment_id`',   'dt' => 3, 'field' => 'payment_id' ),
	array( 'db' => '`t`.`req_amount`',     'dt' => 4, 'field' => 'req_amount'),
	array( 'db' => '`t`.`remark`',     'dt' => 5, 'field' => 'remark'),
	array(
        'db'        => '`t`.`date`',
        'dt'        => 6,
        'field' => 'date',
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', $d);
        }
    ),
	array( 'db' => '`u`.`mobile`',     'dt' => 7, 'field' => 'mobile'),
	array( 'db' => '`t`.`type`',     'dt' => 8, 'field' => 'type')
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

$joinQuery = "FROM `tbl_transaction` AS `t` LEFT JOIN `tbl_user` AS `u` ON (`u`.`id` = `t`.`user_id`)";
$extraWhere = "`t`.`status` != 0";
// $groupBy = "`u`.`office`";
// $having = "`u`.`salary` >= 140000";

echo json_encode(
	// SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere )
);