<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$id   = $_POST['id'];
	$kode = $proses->input($_POST['kode']);
	$nama = $proses->input($_POST['nama']);
	$alamat = $proses->input($_POST['alamat']);
	$status = $proses->input($_POST['status']);

	
	
		$stmt = $db->prepare("UPDATE suplier SET kode_suplier = '".$kode."', nama_suplier = '".$nama."', alamat_suplier = '".$alamat."', status = '".$status."' WHERE id_suplier = $id");
		$stmt->execute();

		echo "1";

	

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>