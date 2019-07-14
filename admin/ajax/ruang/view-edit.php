<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM ruang WHERE id_ruang = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_ruang'] ?>" id="id">

	<div class="form-group">
            <label for="email">Kode Ruangan:</label>
            <input type="text" class="form-control" id="kode_ruang_edit" name="kode_ruang" value="<?php echo $data['kode_ruang']; ?>">
          </div>

          <div class="form-group">
            <label for="email">Nama Ruangan:</label>
            <input type="text" class="form-control" id="nama_ruang_edit" name="nama_ruang" value="<?php echo $data['nama_ruang']; ?>">
          </div>

          <div class="form-group">
            <label for="email">Jenis Ruangan:</label>
            <select id="jenis_edit" class="form-control">
                <option value="" disabled selected>Pilih Jenis</option>
                <?php  

                  $kelas = $proses->select('jenis_ruang');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_jenis_ruang'] ?>" <?php if($ke['id_jenis_ruang'] == $data['id_jenis_ruang']){ echo "selected"; } ?>><?php echo $ke['nama_jenis_ruang'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Keterangan:</label>
            <textarea name="keterangan" id="keterangan_edit" maxlength="100" class="form-control"><?php echo $data['keterangan_ruang'] ?></textarea>
          </div>

          <div class="form-group">
	  	<label>Status</label>

	  	<select id="status_edit" class="form-control">
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

	