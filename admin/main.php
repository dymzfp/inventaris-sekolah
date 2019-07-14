<?php  

	$hal = isset($_GET['hal']) ? $_GET['hal'] : 'home';

	if ($hal == 'home') {
		include "hal/home.php";
	}
	else if ($hal == 'stok-barang') {
		include "hal/stok-barang.php";
	}
	else if ($hal == 'peminjaman') {
		include "hal/peminjaman.php";
	}

	

	else {

		if ($petugas['level'] == 1) {
			// administrator
			if ($hal == 'operator') {
				include "hal/operator.php";
			}
			else if ($hal == 'peminjam') {
				include "hal/peminjam.php";
			}


			else if ($hal == 'ruang') {
				include "hal/ruang.php";
			}
			else if ($hal == 'suplier') {
				include "hal/suplier.php";
			}
			else if ($hal == 'daf-barang') {
				include "hal/daf-barang.php";
			}
			
			else if ($hal == 'mas-barang') {
				include "hal/mas-barang.php";
			}
			else if ($hal == 'jabatan') {
				include "hal/jabatan.php";
			}
			else if ($hal == 'jen-barang') {
				include "hal/jen-barang.php";
			}
			else if ($hal == 'jen-ruang') {
				include "hal/jen-ruang.php";
			}
			else{
				include "hal/home.php";	
			}

		}
		else{
			include "hal/home.php";	
		}

	}

?>