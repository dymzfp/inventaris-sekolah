<?php  

	require_once('../../../lib/php/koneksi.php');

	$table = "jabatan";
	$pri = "id_jabatan";
	$id = $_POST['id'];

	$hapus = $proses->delete($table, $pri, $id);

	echo "{}";


?>