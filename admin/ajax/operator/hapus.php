<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "petugas";
	$pri = "id_petugas";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>