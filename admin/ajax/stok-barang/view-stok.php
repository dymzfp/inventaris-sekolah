<?php  

	$ruang = $_POST['id_ruang'];

	
	$stmt = $db->prepare("SELECT 
      a.id_inventaris,
      a.jumlah_inventaris as jumlah, 
      a.keterangan_inventaris as ket,
      b.nama_barang,
      c.nama_ruang,
      e.nama_kondisi
    FROM inventaris a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON a.id_ruang = c.id_ruang LEFT JOIN kondisi e ON a.id_kondisi = e.id_kondisi WHERE a.id_ruang = :ruang");

	$stmt->bindParam(":ruang", $ruang);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($stmt->rowCount() > 0) {
      # code...
      foreach ($data as $k) {
      	?>

      	<tr>
      	  <th><?php echo $k['id_inventaris']; ?></th>
  	      <th><?php echo $k['nama_barang']; ?></th>
  	      <th><?php echo $k['jumlah']; ?></th>
  	      <th><?php echo $k['nama_kondisi'] ?></th>
  	      <th><?php echo $k['ket'] ?></th>
  	    </tr>

      	<?php
      }
    
    }
    else {

      echo "<tr><td colspan='5'>Kosong</td></tr>";

    }



?>