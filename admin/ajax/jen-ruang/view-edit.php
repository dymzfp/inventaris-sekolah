<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM jenis_ruang WHERE id_jenis_ruang = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_jenis_ruang'] ?>" id="id-edit">

	  <div class="form-group">
	    <label for="email">Nama Jenis Ruang:</label>
	    <input type="text" class="form-control" id="nama-edit" name="nama" value="<?php echo $data['nama_jenis_ruang'] ?>">
	  </div>
