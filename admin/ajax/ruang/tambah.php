<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$kode_ruang = $proses->input($_POST['kode_ruang']);
	$nama_ruang = $proses->input($_POST['nama_ruang']);
	$jenis 		= $_POST['jenis'];
	$keterangan = $proses->input($_POST['keterangan']);
	$status 	= $proses->input($_POST['status']);
	
	$cek_ruang = $db->prepare("SELECT * FROM ruang WHERE kode_ruang = :kode_ruang");
	$cek_ruang->bindParam(":kode_ruang", $kode_ruang);
	$cek_ruang->execute();

	if ($cek_ruang->rowCount() > 0) {
		
		echo "0";

	}
	else {

		$data = array(
			'id_jenis_ruang' 	=> $jenis,
			'kode_ruang' => $kode_ruang,
			'nama_ruang' => $nama_ruang,
			'keterangan_ruang' => $keterangan,
			'status' 	=> $status,
		);

		$input = $proses->insert('ruang', $data);

		if ($input) {
			echo "1";
		}
		else {
			echo "2";
		}

	}

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status'=>$hasil));

?>