<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM jabatan WHERE id_jabatan = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_jabatan'] ?>" id="id-edit">

	  <div class="form-group">
	    <label for="email">Nama Jabatan:</label>
	    <input type="text" class="form-control" id="nama-edit" name="nama" value="<?php echo $data['nama_jabatan'] ?>">
	  </div>
