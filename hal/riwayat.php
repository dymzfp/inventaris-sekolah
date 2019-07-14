<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Peminjaman </h1>

            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a> -->
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Peminjaman</h6>


            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="peminjam">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Pinjam</th>
                      <th>Ruang</th>
                      <th>Keterangan</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl kembali</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Pinjam</th>
                      <th>Ruang</th>
                      <th>Keterangan</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl kembali</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody id="body-pinjam">
                    
                    
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
          <h5 class="modal-title" id="exampleModalLabel">Tambahkan Peminjam</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="email">Nama Peminjam:</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>

          <div class="form-group">
            <label for="email">Jabatan:</label>
            <select id="jabatan" class="form-control">
                <option value="" disabled selected>Pilih Jabatan</option>
                <?php  

                  $kelas = $proses->select('jabatan');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_jabatan'] ?>"><?php echo $ke['nama_jabatan'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Kelas:</label>
            <select id="kelas" class="form-control">
                <option value="" disabled selected>Pilih Kelas</option>
                <?php  

                  $kelas = $proses->select('kelas');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_kelas'] ?>"><?php echo $ke['nama_kelas'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="pwd">Ulangi Password:</label>
            <input type="password" class="form-control" id="password2" name="password2">
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Peminjam</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <label for="email">Nama Operator:</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="pwd">Ualangi Password:</label>
            <input type="password" class="form-control" id="password2" name="password2">
          </div>
          

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" id="masuk-tambah">Tambah</a>
        </div>
      </div>
    </div>
  </div>