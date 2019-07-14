<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "barang";
	$pri = "id_barang";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>