<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Barang</h1>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>


            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="daf-barang">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Jenis</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Jenis</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

  <!-- tambah Modal-->
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambahkan Daftar Barang</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <?php  

            $kode_sup = $proses->kode(6);

            $cek_kode_sup = $db->prepare("SELECT * FROM suplier WHERE kode_suplier = :kode_sup");
            $cek_kode_sup->bindParam(":kode_sup", $kode_sup);
            $cek_kode_sup->execute(); 
            
            $row_cek_kode_sup = $cek_kode_sup->rowCount();

            $kode_sup_final = $kode_sup;

            while ($row_cek_kode_sup > 0) {
              
              $kode_sup = $proses->kode(6);

              $kode_sup_final = $kode_sup;

              $cek_kode_sup = $kon->prepare("SELECT * FROM suplier WHERE kode_suplier = :kode_sup");
              $cek_kode_sup->bindParam(":kode_sup", $kode_sup);
              $cek_kode_sup->execute(); 
              
              $row_cek_kode_sup = $cek_kode_sup->rowCount();
            
            }

            // echo $kode_sup_final;


          ?>

          <div class="form-group">
            <label for="email">Kode Barang:</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kode_sup_final ?>" disabled>
          </div>

          <div class="form-group">
            <label for="email">Nama Barang:</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>

          <div class="form-group">
            <label for="email">Jenis Barang:</label>
            <select id="jenis" class="form-control">
                <option value="" disabled selected>Pilih Jenis</option>
                <?php  

                  $kelas = $proses->select('jenis_barang');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_jenis_barang'] ?>"><?php echo $ke['nama_jenis_barang'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>

          

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" id="masuk-tambah">Tambah</a>
        </div>
      </div>
    </div>
  </div>



  <!-- edit Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="edit-sup">

          
          

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" id="masuk-edit">Edit</a>
        </div>
      </div>
    </div>
  </div>