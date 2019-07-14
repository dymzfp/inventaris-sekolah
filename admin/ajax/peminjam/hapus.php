<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "peminjam";
	$pri = "id_peminjam";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>