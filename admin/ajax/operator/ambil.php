<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
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
$table = <<<EOT
 (
    SELECT 
      a.id_petugas, 
      a.nama_petugas, 
      a.username, 
      b.nama_level_petugas AS nama_level
    FROM petugas a
    LEFT JOIN level_petugas b ON a.id_level_petugas = b.id_level_petugas WHERE a.id_level_petugas = 2
 ) temp
EOT;
 
// Table's primary key
$primaryKey = 'id_petugas';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_petugas', 'dt' => 0 ),
    array( 'db' => 'nama_petugas',  'dt' => 1 ),
    array( 'db' => 'username',   'dt' => 2 ),
    array( 'db' => 'nama_level', 'dt' => 3 ),

    array( 'db' => 'id_petugas', 'dt' => 4, 'formatter' => function( $d, $row ) {
                return '<a href="#" data-id="'.$d.'" class="edit-form" data-toggle="modal" data-target="#editModal"><span class="label label-inverse"><i class="fa fa-edit"></i> Edit</span></a> | <a href="#" data-id="'.$d.'" class="edit-form" data-toggle="modal" data-target="#editModalPass"><span class="label label-inverse text-success"><i class="fa fa-edit"></i> Ganti password</span></a> | <a href="#" data-id="'.$d.'" class="hapus-form"><span class="label label-inverse text-danger"><i class="fa fa-edit"></i> Hapus</span></a>';} )
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'db_inventaris',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( '../../../lib/php/ssp.class.php' );
 
// Validate the JSONP to make use it is an okay Javascript function to execute
$jsonp = preg_match('/^[$A-Z_][0-9A-Z_$]*$/i', $_GET['callback']) ?
    $_GET['callback'] :
    false;
 
if ( $jsonp ) {
    echo $jsonp.'('.json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    ).');';
}