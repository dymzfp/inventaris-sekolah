<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT 
      a.id_inventaris,
      a.jumlah_inventaris as jumlah, 
      a.keterangan_inventaris as ket,
      b.nama_barang,
      c.nama_ruang,
      e.nama_kondisi
    FROM inventaris a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON a.id_ruang = c.id_ruang LEFT JOIN kondisi e ON a.id_kondisi = e.id_kondisi WHERE a.id_inventaris = :id");
	
	$stmt->bindParam(":id", $id);
	
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_inventaris'] ?>" id="id">

	<div class="form-group">
	    <label for="email">Nama Barang:</label>
	    <input type="text" class="form-control" id="nama_barang" name="kode" value="<?php echo $data['nama_barang'] ?>" disabled>
	  </div>

	  <div class="form-group">
	    <label for="email">Stok Tersedia:</label>
	    <input type="text" class="form-control" id="stok_tersedia" name="nama" value="<?php echo $data['jumlah'] ?>" disabled>
	  </div>

	  <div class="form-group">
	    <label for="email">Jumlah Pinjam:</label>
	    <input type="number" class="form-control" id="jumlah_pinjam" name="nama" min="1">
	  </div>

	  <div class="form-group">
	  	<label>Keterangan</label>
	  	<textarea class="form-control" id="keterangan"></textarea>
	  </div>

	  