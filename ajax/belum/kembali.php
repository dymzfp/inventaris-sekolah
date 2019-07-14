<?php  

	require_once('../../lib/php/koneksi.php');

	ob_start();

	$id   = $_POST['id'];

	
	
		$stmt = $db->prepare("UPDATE pinjam SET status_pinjam = '1' WHERE id_pinjam = $id");
		$stmt->execute();

		echo "1";

	

	$hasil = ob_get_contents();

	ob_end_clean();

	echo json_encode(array('status' => $hasil ));

?>