<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "suplier";
	$pri = "id_suplier";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>