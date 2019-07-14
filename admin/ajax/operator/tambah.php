<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$username = $proses->input($_POST['username']);
	$nama = $proses->input($_POST['nama']);
	$password = $proses->input($_POST['password']);

	$pass = password_hash($password, PASSWORD_DEFAULT);
	$level = 2;

	$cek_username = $db->prepare("SELECT * FROM petugas WHERE username = :username");
	$cek_username->bindParam(":username", $username);
	$cek_username->execute();

	if ($cek_username->rowCount() > 0) {

		echo "0";
	
	}
	else {
	
		$data = array(
			'username' => $username,
			'password' => $pass,
			'nama_petugas' => $nama,
			'id_level_petugas' => $level 
		);

		$input = $proses->insert('petugas', $data);

		echo "1";

	}

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>