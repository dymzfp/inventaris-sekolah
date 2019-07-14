<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$id = $_POST['id'];
	$username = $proses->input($_POST['username']);
	$nama = $proses->input($_POST['nama']);
	$kelas = $_POST['kelas'];
	$jabatan = $_POST['jabatan'];
	
	$cek_username = $db->prepare("SELECT * FROM peminjam WHERE username = :username AND id_peminjam != $id");
	$cek_username->bindParam(":username", $username);
	$cek_username->execute();

	if ($cek_username->rowCount() > 0) {
		
		echo "0";

	}
	else {

		$stmt = $db->prepare("UPDATE `peminjam` SET `id_jabatan`='".$jabatan."',`id_kelas`='".$kelas."',`nama_peminjam`='".$nama."',`username`='".$username."' WHERE id_peminjam = $id");
		
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