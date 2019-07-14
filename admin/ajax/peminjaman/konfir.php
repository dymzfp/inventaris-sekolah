<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

		$id   = $_POST['id'];

	
		$kembali = date("Y-m-d");
		
		$stmt = $db->prepare("UPDATE pinjam SET status_pinjam = '2', tanggal_kembali = '".$kembali."' WHERE id_pinjam = $id");
		

		
		if ($stmt->execute()) {
			
			$ss = $db->prepare("SELECT jumlah_pinjam, id_inventaris FROM pinjam WHERE id_pinjam = $id");
			$ss->execute();

			$data = $ss->fetch();

			$dd = $db->prepare("UPDATE inventaris SET jumlah_inventaris = jumlah_inventaris + ".$data['jumlah_pinjam']. " WHERE id_inventaris = ". $data['id_inventaris']);

			if ($dd->execute()) {
				echo "1";
			}

		}

	

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>