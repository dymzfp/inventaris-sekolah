<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM petugas WHERE id_petugas = :id AND id_level_petugas = 2");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_petugas'] ?>" id="id">

  <div class="form-group">
    <label for="email">Password Baru:</label>
    <input type="text" class="form-control" id="password_edit" name="nama">
  </div>
  

	

	