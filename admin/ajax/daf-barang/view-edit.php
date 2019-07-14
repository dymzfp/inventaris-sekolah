<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM barang WHERE id_barang = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_barang'] ?>" id="id">


          <div class="form-group">
            <label for="email">Kode Barang:</label>
            <input type="text" class="form-control" id="kode_edit" name="kode" value="<?php echo $data['kode_barang'] ?>" disabled>
          </div>

          <div class="form-group">
            <label for="email">Nama Barang:</label>
            <input type="text" class="form-control" id="nama_edit" name="nama" value="<?php echo $data['nama_barang'] ?>">
          </div>

          <div class="form-group">
            <label for="email">Jenis Barang:</label>
            <select id="jenis_edit" class="form-control">
                <option value="" disabled selected>Pilih Jenis</option>
                <?php  

                  $kelas = $proses->select('jenis_barang');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_jenis_barang'] ?>" <?php if($ke['id_jenis_barang'] == $data['id_jenis_barang']){ echo "selected"; } ?>><?php echo $ke['nama_jenis_barang'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>

	