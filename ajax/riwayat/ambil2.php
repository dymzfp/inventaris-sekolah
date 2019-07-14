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
      a.id_pinjam,
      a.jumlah_pinjam, 
      a.tanggal_pinjam, 
      a.tanggal_kembali,
      a.keterangan_pinjam as keterangan,
      a.status_pinjam,
      c.nama_peminjam,
      f.nama_kelas,
      d.nama_barang,
      e.nama_ruang
    FROM pinjam a LEFT JOIN inventaris b ON a.id_inventaris = b.id_inventaris LEFT JOIN peminjam c ON a.id_peminjam = c.id_peminjam LEFT JOIN barang d ON b.id_barang = d.id_barang LEFT JOIN ruang e ON b.id_ruang = e.id_ruang LEFT JOIN kelas f ON c.id_kelas = f.id_kelas
 ) temp
EOT;
 
// Table's primary key
$primaryKey = 'id_pinjam';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_pinjam', 'dt' => 0 ),
    array( 'db' => 'nama_barang', 'dt' => 1 ),
    array( 'db' => 'nama_peminjam',  'dt' => 2 ),
    array( 'db' => 'nama_kelas',   'dt' => 3 ),
    array( 'db' => 'nama_ruang', 'dt' => 4 ),
    array( 'db' => 'keterangan', 'dt' => 5 ),
    array( 'db' => 'tanggal_pinjam', 'dt' => 6, 'formatter' => function( $d, $row ) {

        $x = substr($d, 0, 10);
        return $x;

    }),
    array( 'db' => 'tanggal_kembali', 'dt' => 7 ),

    array( 'db' => 'status_pinjam', 'dt' => 8, 'formatter' => function( $d, $row ) {

                if ($d == 0) {
                  return '<span class="bg-danger text-light" style="padding:0 4px">belum dikembalikan</span>';
                }
                else if ($d == 1) {
                  return '<span class="bg-info text-light" style="padding:0 4px">menunggu konfirmasi</span>'; 
                }
                else {
                  return '<span class="bg-success text-light" style="padding:0 4px">sudah dikembalikan</span>'; 
                }

    }),

    array( 'db' => 'status_pinjam', 'dt' => 9, 'formatter' => function( $d, $row ) {
                if ($d == 1) {
                  return '<a href="#" data-id="'.$d.'" class="kofir-kembali"><span class="label label-inverse"><i class="fa fa-edit"></i> Konfirmasi</span></a>'; 
                }

              } ),
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
require( '../../lib/php/ssp.class.php' );
 
// Validate the JSONP to make use it is an okay Javascript function to execute
$jsonp = preg_match('/^[$A-Z_][0-9A-Z_$]*$/i', $_GET['callback']) ?
    $_GET['callback'] :
    false;
 
if ( $jsonp ) {
    echo $jsonp.'('.json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    ).');';
}