<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "jenis_ruang";
	$pri = "id_jenis_ruang";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>