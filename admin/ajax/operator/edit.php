<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$username = $proses->input($_POST['username']);
	$nama = $proses->input($_POST['nama']);

	$id = $_POST['id'];

	$cek_username = $db->prepare("SELECT * FROM petugas WHERE username = :username AND id_petugas != $id");
	$cek_username->bindParam(":username", $username);
	$cek_username->execute();

	if ($cek_username->rowCount() > 0) {

		echo "0";
	
	}
	else {
	
		$stmt = $db->prepare("UPDATE `petugas` SET `nama_petugas`='".$nama."',`username`='".$username."' WHERE id_petugas = $id");
		
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