<?php  

	require_once('../../lib/php/koneksi.php');

	ob_start();

	$id = $proses->input($_POST['id']);
	$peminjam = $proses->input($_POST['peminjam']);
	$jumlah = $proses->input($_POST['jumlah']);
	$ket = $proses->input($_POST['ket']);


	
		$data = array(
			'id_inventaris' => $id,
			'id_peminjam' => $peminjam,
			'jumlah_pinjam' => $jumlah,
			'keterangan_pinjam' => $ket 
		);

		$input = $proses->insert('pinjam', $data);

		if ($input) {
			
			$stmt = $db->prepare("UPDATE inventaris SET jumlah_inventaris = jumlah_inventaris - ".$jumlah." WHERE id_inventaris = ".$id);
			$stmt->execute();

			echo "1";

		};

	

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>