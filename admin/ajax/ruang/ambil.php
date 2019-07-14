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
      a.id_ruang,
      a.kode_ruang,
      a.nama_ruang as nama, 
      a.keterangan_ruang as ket,
      a.status,
      b.nama_jenis_ruang as jenis
    FROM ruang a LEFT JOIN jenis_ruang b ON a.id_jenis_ruang = b.id_jenis_ruang
 ) temp
EOT;
 
// Table's primary key
$primaryKey = 'id_ruang';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'kode_ruang', 'dt' => 0 ),
    array( 'db' => 'nama',  'dt' => 1 ),
    array( 'db' => 'jenis',   'dt' => 2 ),
    array( 'db' => 'ket', 'dt' => 3 ),
    array( 'db' => 'status', 'dt' => 4, 'formatter' => function( $d, $row ) {

                if ($d == 1) {
                  return '<span class="bg-success text-light" style="padding:0 4px">tersedia</span>';
                }
                else {
                  return '<span class="bg-danger text-light" style="padding:0 4px">tidak tersedia</span>'; 
                }

                }),

    array( 'db' => 'id_ruang', 'dt' => 5, 'formatter' => function( $d, $row ) {
                return '<a href="#" data-id="'.$d.'" class="edit-form" data-toggle="modal" data-target="#editModal"><span class="label label-inverse"><i class="fa fa-edit"></i> Edit</span></a> | <a href="#" data-id="'.$d.'" class="hapus-form"><span class="label label-inverse text-danger"><i class="fa fa-edit"></i> Hapus</span></a>';} )
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