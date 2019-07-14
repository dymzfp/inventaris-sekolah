<?php  
    

  $id = $_POST['id'];
  

	
	$stmt = $db->prepare("SELECT 
      a.id_pinjam,
      a.jumlah_pinjam, 
      a.tanggal_pinjam, 
      a.tanggal_kembali,
      a.keterangan_pinjam as keterangan,
      a.status_pinjam,
      c.nama_peminjam,
      f.nama_kelas,
      d.nama_barang,
      e.nama_ruang
    FROM pinjam a LEFT JOIN inventaris b ON a.id_inventaris = b.id_inventaris LEFT JOIN peminjam c ON a.id_peminjam = c.id_peminjam LEFT JOIN barang d ON b.id_barang = d.id_barang LEFT JOIN ruang e ON b.id_ruang = e.id_ruang LEFT JOIN kelas f ON c.id_kelas = f.id_kelas WHERE a.id_peminjam = ". $id . " AND a.status_pinjam != 2 ORDER BY a.id_pinjam DESC");

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
      
    

    foreach ($data as $k) {
    	?>

    	<tr>
    	  <th><?php echo $k['id_pinjam']; ?></th>
	      <th><?php echo $k['nama_barang']; ?></th>
        <th><?php echo $k['jumlah_pinjam'] ?></th>
	      <th><?php echo $k['nama_ruang'] ?></th>
        <th><?php echo $k['keterangan']; ?></th>
        <th><?php echo substr($k['tanggal_pinjam'], 0, 10); ?></th>
        <th><?php if ($k['status_pinjam'] == 0) {
                  echo '<span class="bg-danger text-light" style="padding:0 4px">belum dikembalikan</span>';
                }
                else if ($k['status_pinjam'] == 1) {
                  echo '<span class="bg-info text-light" style="padding:0 4px">menunggu konfirmasi</span>'; 
                } ?></th>
        <th><?php if ($k['status_pinjam'] == 0) {
                  echo '<a href="#" data-id="'.$k['id_pinjam'].'" class="kofir-kembali"><span class="label label-inverse"><i class="fa fa-edit"></i> Kembalikan</span></a>';
                }
                
                ?></th>
	    </tr>

    	<?php
    }

  } else {

    echo "<tr><td colspan='6'><span style='padding: 24px;font-weight: bold;text-align-center'>Kosong<span></td></tr>";

  }


  


?>