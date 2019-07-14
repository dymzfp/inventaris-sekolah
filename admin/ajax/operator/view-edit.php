<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM petugas WHERE id_petugas = :id AND id_level_petugas = 2");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_petugas'] ?>" id="id">

  <div class="form-group">
    <label for="email">Nama Operator:</label>
    <input type="text" class="form-control" id="nama_edit" name="nama" value="<?php echo $data['nama_petugas'] ?>">
  </div>
  <div class="form-group">
    <label for="email">Username:</label>
    <input type="text" class="form-control" id="username_edit" name="username" value="<?php echo $data['username'] ?>">
  </div>

	

	