<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$kode = $proses->input($_POST['kode']);
	$nama = $proses->input($_POST['nama']);
	$jenis = $proses->input($_POST['jenis']);

	$cek_kode = $db->prepare("SELECT * FROM barang WHERE kode_barang = :kode");
	$cek_kode->bindParam(":kode", $kode);
	$cek_kode->execute();

	if ($cek_kode->rowCount() > 0) {

		echo "0";
	
	}
	else {
	
		$data = array(
			'id_jenis_barang' => $jenis,
			'kode_barang' => $kode,
			'nama_barang' => $nama,
		);

		$input = $proses->insert('barang', $data);

		echo "1";

	}

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>	