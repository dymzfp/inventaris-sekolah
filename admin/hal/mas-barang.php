<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Barang Masuk</h1>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>


            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="peminjam">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama Barang</th>
                      <th>Ruangan</th>
                      <th>Suplier</th>
                      <th>Jumlah</th>
                      <th>Tgl Register</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Nama Barang</th>
                      <th>Ruangan</th>
                      <th>Suplier</th>
                      <th>Jumlah</th>
                      <th>Tgl Register</th>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambahkan Barang Masuk</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="email">Barang:</label>
            <select id="id_barang" class="form-control">
                <option value="" disabled selected>Pilih Barang</option>
                <?php  

                  $kelas = $proses->select('barang');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_barang'] ?>"><?php echo $ke['nama_barang'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Ruangan:</label>
            <select id="ruang" class="form-control">
                <option value="" disabled selected>Pilih Ruangan</option>
                <?php  

                  $kelas = $proses->select('ruang');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_ruang'] ?>" <?php if($ke['status'] != 1){ echo "disabled"; } ?>><?php echo $ke['nama_ruang'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Suplier:</label>
            <select id="suplier" class="form-control">
                <option value="" disabled selected>Pilih Suplier</option>
                <?php  

                  $kelas = $proses->select('suplier');

                  foreach ($kelas as $ke) {
                    ?>
                    <option value="<?php echo $ke['id_suplier'] ?>" <?php if($ke['status']== 0){echo "disabled";} ?>><?php echo $ke['nama_suplier'] ?></option>
                <?php
                  }

                ?>
            </select>
          </div>
          

          <div class="form-group">
            <label for="email">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1">
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