<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Barang</div>
                      <?php  

                        $asu = $db->prepare("SELECT count(*) as jumlah FROM barang");
                        $asu->execute();

                        $barang = $asu->fetch(PDO::FETCH_ASSOC);

                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $barang['jumlah']; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <?php  

                        $cok = $db->prepare("SELECT count(*) as jumlah FROM ruang");
                        $cok->execute();

                        $ruang = $cok->fetch(PDO::FETCH_ASSOC);

                      ?>
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Ruangan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ruang['jumlah'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <?php  

                        $tel = $db->prepare("SELECT count(*) as jumlah FROM peminjam");
                        $tel->execute();

                        $pe = $tel->fetch(PDO::FETCH_ASSOC);

                      ?>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Peminjam</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pe['jumlah'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            
          </div>

          <!-- Content Row -->

          

          

        </div>
        <!-- /.container-fluid -->