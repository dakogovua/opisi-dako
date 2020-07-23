<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/catalog/includes/constants.php';
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

if (!$_SESSION['session_db']){
	$table = 'kartochki';
}
else {
	$table = $_SESSION['session_db'];
}

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'id', 'dt' => 0 ),
//	array( 'db' => 'box',  'dt' => 1 ),
	array( 'db' => 'guber',     'dt' => 1 ),
	array( 'db' => 'povet',     'dt' => 2 ),
	array( 'db' => 'selo',   'dt' => 3 ),
	array( 'db' => 'content',     'dt' => 4 ),


	array( 'db' => 'date',     'dt' => 5 ),
	array( 'db' => 'fond_number',     'dt' => 6 ),
	array( 'db' => 'fond_name',     'dt' => 7 ),

	array( 'db' => 'opis_number',     'dt' => 8 ),
	array( 'db' => 'sprava_number',     'dt' => 9 ),
	array( 'db' => 'paper_number',     'dt' => 10 ),

);

// SQL server connection information
/*$sql_details = array(
	'user' => 'cataloguser',
	'pass' => 'DAKOcatalog23',
	'db'   => 'catalogdb',
	'host' => '127.0.0.1'
);
*/
$sql_details = array(
	'user' => DB_USER,
	'pass' => DB_PASS,
	'db'   => DB_NAME,
	'host' => DB_SERVER
);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


