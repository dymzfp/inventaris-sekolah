<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$id         = $_POST['id'];
	$kode_ruang = $proses->input($_POST['kode_ruang']);
	$nama_ruang = $proses->input($_POST['nama_ruang']);
	$jenis 		= $_POST['jenis'];
	$keterangan = $proses->input($_POST['keterangan']);
	$status 	= $proses->input($_POST['status']);
	
	$cek_ruang = $db->prepare("SELECT * FROM ruang WHERE kode_ruang = :kode_ruang AND id_ruang != $id");
	$cek_ruang->bindParam(":kode_ruang", $kode_ruang);
	$cek_ruang->execute();

	if ($cek_ruang->rowCount() > 0) {
		
		echo "0";

	}
	else {

		$stmt = $db->prepare("UPDATE `ruang` SET `id_jenis_ruang`= ".$jenis.",`kode_ruang`= '".$kode_ruang."',`nama_ruang`='".$nama_ruang."',`keterangan_ruang`='".$keterangan."',`status`='".$status."' WHERE id_ruang = $id");
		
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

	echo json_encode(array('status'=>$hasil));

?>