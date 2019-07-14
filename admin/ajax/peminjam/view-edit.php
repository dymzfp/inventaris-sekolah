<?php  

	$id = $_POST['id']; 

	$stmt = $db->prepare("SELECT * FROM peminjam WHERE id_peminjam = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$data = $stmt->fetch();


?>

	<input type="hidden" value="<?php echo $data['id_peminjam'] ?>" id="id_edit">

  <div class="form-group">
            <label for="email">Nama Peminjam:</label>
            <input type="text" class="form-control" id="nama_edit" name="nama" value="<?php echo $data['nama_peminjam'] ?>">
          </div>

          <div class="form-group">
            <label for="email">Jabatan:</label>
            <select id="jabatan_edit" class="form-control">
                <option value="" disabled selected>Pilih Jabatan</option>
                <?php  

                  $kelas = $proses->select('jabatan');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_jabatan'] ?>" <?php if($ke['id_jabatan'] == $data['id_jabatan']){ echo "selected"; } ?>><?php echo $ke['nama_jabatan'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Kelas:</label>
            <select id="kelas_edit" class="form-control">
                <option value="" disabled selected>Pilih Kelas</option>
                <?php  

                  $kelas = $proses->select('kelas');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_kelas'] ?>" <?php if($ke['id_kelas'] == $data['id_kelas']){ echo "selected"; } ?>><?php echo $ke['nama_kelas'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control" id="username_edit" name="username" value="<?php echo $data['username']; ?>">
          </div>

	

	