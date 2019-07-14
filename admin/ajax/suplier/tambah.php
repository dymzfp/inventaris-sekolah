<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$kode = $proses->input($_POST['kode']);
	$nama = $proses->input($_POST['nama']);
	$alamat = $proses->input($_POST['alamat']);
	$status = $proses->input($_POST['status']);

	$cek_kode = $db->prepare("SELECT * FROM suplier WHERE kode_suplier = :kode_suplier");
	$cek_kode->bindParam(":kode_suplier", $kode);
	$cek_kode->execute();

	if ($cek_kode->rowCount() > 0) {

		echo "0";
	
	}
	else {
	
		$data = array(
			'kode_suplier' => $kode,
			'nama_suplier' => $nama,
			'alamat_suplier' => $alamat,
			'status' => $status 
		);

		$input = $proses->insert('suplier', $data);

		if ($input) {
			echo "1";
		}
		else {
			echo "0";
		}


	}

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>