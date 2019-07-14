<?php  

	require_once('../../../lib/php/koneksi.php');

	ob_start();

	$password = $proses->input($_POST['password']);

	$id = $_POST['id'];

	$pass = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $db->prepare("UPDATE `petugas` SET `password`='".$pass."' WHERE id_petugas = $id");
		
		$input = $stmt->execute();

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