<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "jenis_barang";
	$pri = "id_jenis_barang";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>