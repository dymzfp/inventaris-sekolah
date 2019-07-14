<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM suplier WHERE id_suplier = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_suplier'] ?>" id="id-edit">

	<div class="form-group">
	    <label for="email">Kode Suplier:</label>
	    <input type="text" class="form-control" id="kode-edit" name="kode" value="<?php echo $data['kode_suplier'] ?>" disabled>
	  </div>

	  <div class="form-group">
	    <label for="email">Nama Suplier:</label>
	    <input type="text" class="form-control" id="nama-edit" name="nama" value="<?php echo $data['nama_suplier'] ?>">
	  </div>

	  <div class="form-group">
	    <label for="email">Alamat:</label>
	    <textarea name="alamat" id="alamat-edit" class="form-control"><?php echo $data['alamat_suplier'] ?></textarea>
	  </div>

	  <div class="form-group">
	  	<label>Status</label>

	  	<select id="status-edit" class="form-control">
	  		<?php
	  			$status = array('0' => 'tidak tersedia', '1' => 'tersedia');

	  			foreach ($status as $key => $value) {
	  				echo "<option value='".$key."'";
	  				if ($key == $data['status']) {
	  					echo "selected";
	  				}
	  				echo ">".$value."</option>";
	  			}
	  		?>
	  	</select>
	  </div>