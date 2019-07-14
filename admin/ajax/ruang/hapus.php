<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "ruang";
	$pri = "id_ruang";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>