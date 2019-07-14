<?php  

	$hal = isset($_GET['hal']) ? $_GET['hal'] : 'home';

	if ($hal == 'home') {
		include "js/home.php";
	}
	else {
		      

		if (isset($peminjam)) {
		                

			if ($hal == 'belum') {
				include "js/belum.php";
			}
			else if ($hal == 'sudah') {
				include "js/sudah.php";
			}
			else if ($hal == 'riwayat') {
				include "js/riwayat.php";
			}
			else {
			include "js/home.php";	
		}

		}
		else {
			include "js/home.php";	
		}
	}

?>