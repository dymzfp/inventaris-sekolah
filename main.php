<?php  

	$hal = isset($_GET['hal']) ? $_GET['hal'] : 'home';

	if ($hal == 'home') {
		include "hal/home.php";
	}
	else {
		      

		if (isset($peminjam)) {
		                

			if ($hal == 'belum') {
				include "hal/belum.php";
			}
			else if ($hal == 'sudah') {
				include "hal/sudah.php";
			}
			else if ($hal == 'riwayat') {
				include "hal/riwayat.php";
			}

else {
			include "hal/home.php";	
		}
		}
		else {
			include "hal/home.php";	
		}
	}

?>