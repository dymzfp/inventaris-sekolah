<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pinjam Barang</h1>

            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a> -->
          </div>

          <!-- DataTales Example -->

          <div class="row">
            <div class="col-6">
              
              <div class="form-group">
                <label for="email">Ruang:</label>
                <select id="pil-ruang" class="form-control">
                    <option value="" disabled selected>Pilih Ruang</option>
                    <?php  

                      $kelas = $proses->select('ruang');

                      foreach ($kelas as $ke) {
                        ?>
                        <option value="<?php echo $ke['id_ruang'] ?>"><?php echo $ke['nama_ruang'] ?></option>
                    <?php
                      }

                    ?>
                </select>
              </div>

              <!-- <div class="form-group">
                <button class="btn btn-primary" id="filter">Cari</button>
              </div> -->

            </div>
          </div>


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Stok Barang</h6>


            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="stok-barang">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody id="body-stok">
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

  <div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pinjam Barang</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="edit-sup">
          
          

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" id="masuk-pinjam">Pinjam</a>
        </div>
      </div>
    </div>
  </div>
  