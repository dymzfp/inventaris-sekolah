<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$nama = $proses->input($_POST['nama']);

	
		$data = array(
			'nama_jenis_barang' => $nama
		);

		$input = $proses->insert('jenis_barang', $data);

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