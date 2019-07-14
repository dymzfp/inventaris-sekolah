<?php  

	$hal = isset($_GET['hal']) ? $_GET['hal'] : 'home';

	if ($hal == 'home') {
		include "js/home.php";
	}
	else if ($hal == 'stok-barang') {
		include "js/stok-barang.php";
	}
	else if ($hal == 'peminjaman') {
		include "js/peminjaman.php";
	}

	

	else {

		if ($petugas['level'] == 1) {
			// administrator
			if ($hal == 'operator') {
				include "js/operator.php";
			}
			else if ($hal == 'peminjam') {
				include "js/peminjam.php";
			}


			else if ($hal == 'ruang') {
				include "js/ruang.php";
			}
			else if ($hal == 'suplier') {
				include "js/suplier.php";
			}
			else if ($hal == 'daf-barang') {
				include "js/daf-barang.php";
			}
			
			else if ($hal == 'mas-barang') {
				include "js/mas-barang.php";
			}
			else if ($hal == 'jabatan') {
				include "js/jabatan.php";
			}
			else if ($hal == 'jen-barang') {
				include "js/jen-barang.php";
			}
			else if ($hal == 'jen-ruang') {
				include "js/jen-ruang.php";
			}
			else{
				include "js/home.php";	
			}

		}
		else{
			include "js/home.php";	
		}

	}

?>