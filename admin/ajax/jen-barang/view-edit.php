<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM jenis_barang WHERE id_jenis_barang = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_jenis_barang'] ?>" id="id-edit">

	  <div class="form-group">
	    <label for="email">Nama Jenis Barang:</label>
	    <input type="text" class="form-control" id="nama-edit" name="nama" value="<?php echo $data['nama_jenis_barang'] ?>">
	  </div>
