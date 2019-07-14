<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ruangan</h1>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Ruangan</h6>


            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="ruangan">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Ruangan</th>
                      <th>Jenis</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Ruangan</th>
                      <th>Jenis</th>
                      <th>Keterangan</th>
                      <th>Status</th>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambahkan Ruangan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="email">Kode Ruangan:</label>
            <input type="text" class="form-control" id="kode_ruang" name="kode_ruang">
          </div>

          <div class="form-group">
            <label for="email">Nama Ruangan:</label>
            <input type="text" class="form-control" id="nama_ruang" name="nama_ruang">
          </div>

          <div class="form-group">
            <label for="email">Jenis Ruangan:</label>
            <select id="jenis" class="form-control">
                <option value="" disabled selected>Pilih Jenis</option>
                <?php  

                  $kelas = $proses->select('jenis_ruang');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_jenis_ruang'] ?>"><?php echo $ke['nama_jenis_ruang'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" maxlength="100" class="form-control"></textarea>
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Ruang</h5>
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