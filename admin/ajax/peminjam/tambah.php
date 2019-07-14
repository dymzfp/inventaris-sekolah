<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$username = $proses->input($_POST['username']);
	$nama = $proses->input($_POST['nama']);
	$kelas = $_POST['kelas'];
	$jabatan = $_POST['jabatan'];
	$password = $proses->input($_POST['password']);

	$pass = password_hash($password, PASSWORD_DEFAULT);
	
	$cek_username = $db->prepare("SELECT * FROM peminjam WHERE username = :username");
	$cek_username->bindParam(":username", $username);
	$cek_username->execute();

	if ($cek_username->rowCount() > 0) {
		
		echo "0";

	}
	else {

		$data = array(
			'id_jabatan' => $jabatan,
			'id_kelas' => $kelas ,
			'nama_peminjam' => $nama,
			'username' => $username,
			'password' => $pass
		);

		$input = $proses->insert('peminjam', $data);

		echo "1";

	}

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status'=>$hasil));

?>