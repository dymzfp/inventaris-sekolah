<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "barang_masuk";
	$pri = "id_barang_masuk";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>