<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$id   = $_POST['id'];
	$nama = $proses->input($_POST['nama']);

	
	
		$stmt = $db->prepare("UPDATE jenis_ruang SET nama_jenis_ruang = '".$nama."' WHERE id_jenis_ruang = $id");
		$input = $stmt->execute();

		if ($input) {
			echo "1";
		}
		else {
			echo "0";
		}

	

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>