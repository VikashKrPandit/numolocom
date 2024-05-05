<?php
include('../include/conn.php');
// DB table to use
$table = 'fees_master';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => '`f`.`id`', 'dt' => 0, 'field' => 'id' ),
    array( 'db' => '`p`.`pkg_name`', 'dt' => 1, 'field' => 'pkg_name' ),
    array( 'db' => '`f`.`price`', 'dt' => 2, 'field' => 'price' ),
    array( 'db' => '`f`.`no_of_winners`', 'dt' => 3, 'field' => 'no_of_winners' ),
    array( 'db' => '`f`.`no_of_tickets`', 'dt' => 4, 'field' => 'no_of_tickets' ),
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
 
require('sspCustom.class.php' );

$joinQuery = "FROM `fees_master` AS `f` left join `tbl_packages` AS `p` ON (`f`.`pkg_id` = `p`.`id`)";
// $extraWhere = "`u`.`is_dummy` = 0";
// $groupBy = "`u`.`office`";
// $having = "`u`.`salary` >= 140000";

echo json_encode(
    // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
);

?>