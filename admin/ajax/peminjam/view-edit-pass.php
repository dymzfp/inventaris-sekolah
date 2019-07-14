<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM peminjam WHERE id_peminjam = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_peminjam'] ?>" id="id_pinjam">

  <div class="form-group">
    <label for="email">Password Baru:</label>
    <input type="text" class="form-control" id="password_edit" name="nama">
  </div>
  

	

	