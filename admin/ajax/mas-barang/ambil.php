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
      a.id_barang_masuk, 
      a.jumlah_masuk as jumlah, 
      a.tanggal_register as tanggal,
      b.nama_barang as barang,
      c.nama_ruang as ruang,
      d.nama_suplier as suplier
    FROM barang_masuk a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON a.id_ruang = c.id_ruang LEFT JOIN suplier d ON a.id_suplier = d.id_suplier ORDER BY a.id_barang_masuk DESC
 ) temp
EOT;
 
// Table's primary key
$primaryKey = 'id_barang_masuk';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_barang_masuk', 'dt' => 0 ),
    array( 'db' => 'barang',  'dt' => 1 ),
    array( 'db' => 'ruang',   'dt' => 2 ),
    array( 'db' => 'suplier', 'dt' => 3 ),
    array( 'db' => 'jumlah', 'dt' => 4 ),
    array( 'db' => 'tanggal', 'dt' => 5, 'formatter' => function( $d, $row ) {

        $x = substr($d, 0, 10);
        return $x;

    } ),

    array( 'db' => 'id_barang_masuk', 'dt' => 6, 'formatter' => function( $d, $row ) {
                return '<a href="#" data-id="'.$d.'" class="hapus-form"><span class="label label-inverse text-danger"><i class="fa fa-edit"></i> Hapus</span></a>';} )
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