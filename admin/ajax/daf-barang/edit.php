<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$id 	= $_POST['id'];
	$kode = $proses->input($_POST['kode']);
	$nama = $proses->input($_POST['nama']);
	$jenis = $proses->input($_POST['jenis']);

	$cek_kode = $db->prepare("SELECT * FROM barang WHERE kode_barang = :kode AND id_barang != $id");
	$cek_kode->bindParam(":kode", $kode);
	$cek_kode->execute();

	if ($cek_kode->rowCount() > 0) {

		echo "0";
	
	}
	else {
	
		$stmt = $db->prepare("UPDATE `barang` SET `id_jenis_barang`='".$jenis."',`kode_barang`='".$kode."',`nama_barang`='".$nama."' WHERE id_barang = $id");
		
		$input = $stmt->execute();

		if ($input) {
			echo "1";
		}
		else {
			echo "2";
		}

	}

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>	