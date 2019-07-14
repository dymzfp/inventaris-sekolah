<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$barang = $proses->input($_POST['barang']);
	$ruang = $proses->input($_POST['ruang']);
	$suplier = $proses->input($_POST['suplier']);
	$jumlah = $proses->input($_POST['jumlah']);

	$cek_kode = $db->prepare("SELECT * FROM inventaris WHERE id_barang = :barang AND id_ruang = :ruang");
	$cek_kode->bindParam(":barang", $barang);
	$cek_kode->bindParam(":ruang", $ruang);
	$cek_kode->execute();


	$data = array(
		'id_barang' => $barang,
		'id_ruang' => $ruang,
		'id_suplier' => $suplier,
		'jumlah_masuk' => $jumlah,
	);

	$input = $proses->insert('barang_masuk', $data);

	if ($input) {
		
		if ($cek_kode->rowCount() > 0) {

			// update

			$stmt = $db->prepare("UPDATE inventaris SET jumlah_inventaris = jumlah_inventaris + :jumlah WHERE id_barang = :barang AND id_ruang = :ruang");
			$stmt->bindParam(":jumlah", $jumlah);
			$stmt->bindParam(":barang", $barang);
			$stmt->bindParam(":ruang", $ruang);

			if ($stmt->execute()) {
				echo "1";
			}
			else {
				echo "0";
			}
		
		}
		else {
		
			$data2 = array(
				'id_barang' => $barang,
				'id_ruang' => $ruang,
				'id_kondisi' => 1,
				'jumlah_inventaris' => $jumlah,
			);

			$input2 = $proses->insert('inventaris', $data2);

			if ($input2) {
				echo "1";
			}
			else {
				echo "0";
			}

		}
		
	}



	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>	