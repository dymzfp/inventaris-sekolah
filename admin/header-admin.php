<?php  

  require_once("../lib/php/koneksi.php");

  if (!$proses->cekLogin()) {
    header("location:login.php");
  }

  // var_dump($_SESSION);

  $petugas = $proses->getPetugas();

  // var_dump($petugas);

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>APLIKASI INVENTARIS SEKOLAH</title>

  <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../assets/sweetalert/sweetalert.css">

  <style type="text/css">
    .kapital {
      text-transform: capitalize;
    }
  </style>

</head>

<body id="page-top">

  <!-- Wadah semua -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Logo -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?hal=home">
        <div class="sidebar-brand-icon">
          <img src="../assets/img/logo.png" style="max-width: 100%">
        </div>
        <div class="sidebar-brand-text mx-3">INVENTARIS</div>
      </a>

      <hr class="sidebar-divider my-0">

      <!-- Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?hal=home">
          <i class="fas fa-home"></i>
          <span>Beranda</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <!-- Header -->
      <div class="sidebar-heading">
        Inventaris
      </div>

      <!-- Menu bercabang -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#barang" aria-expanded="true" aria-controls="barang">
          <i class="fas fa-fw fa-cog"></i>
          <span>Barang</span>
        </a>

        <div id="barang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?php  

        if ($petugas['level'] == 1) {

      ?>
            <a class="collapse-item" href="index.php?hal=daf-barang">Daftar Barang</a>
            <a class="collapse-item" href="index.php?hal=mas-barang">Barang Masuk</a>

            <?php  

              }

            ?>
            <a class="collapse-item" href="index.php?hal=stok-barang">Stok Barang</a>
            <!-- <a class="collapse-item" href="#">Barang Keluar</a> -->
          </div>
        </div>
      </li>

      <!-- Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?hal=peminjaman">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Peminjaman</span>
        </a>
      </li>

      <?php  

        if ($petugas['level'] == 1) {

      ?>

      <hr class="sidebar-divider">

      <!-- Header -->
      <div class="sidebar-heading">
      Database
      </div>

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengguna" aria-expanded="true" aria-controls="pengguna">
          <i class="fas fa-fw fa-user"></i>
          <span>Pengguna</span>
        </a>

        <div id="pengguna" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?hal=operator">Operator</a>
            <a class="collapse-item" href="index.php?hal=peminjam">Peminjam</a>
          </div>
        </div>
      </li>

      

      <li class="nav-item">
        <a class="nav-link" href="index.php?hal=ruang">
          <i class="fas fa-fw fa-table"></i>
          <span>Ruangan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?hal=suplier">
          <i class="fas fa-fw fa-table"></i>
          <span>Suplier</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#"  data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="master">
          <i class="fas fa-fw fa-table"></i>
          <span>Master</span>
        </a>

        <div id="master" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <a class="collapse-item" href="index.php?hal=level">Level</a> -->
            <a class="collapse-item" href="index.php?hal=jabatan">Jabatan</a>
            <a class="collapse-item" href="index.php?hal=jen-barang">Jenis Barang</a>
            <a class="collapse-item" href="index.php?hal=jen-ruang">Jenis Ruangan</a>
            <!-- <a class="collapse-item" href="index.php?hal=jen-barang">Kondisi Barang</a> -->
          </div>
        </div>
      </li>

      <?php  

        }

      ?>

    <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <span class="kapital"><?php echo $petugas['nama_level']; ?></span>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            



          <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- User -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-user"></span>
                <span class="ml-2 d-none d-lg-inline text-gray-600 small"><?php echo $petugas['nama_petugas']; ?></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  <span class="kapital"><?php echo $petugas['nama_level']; ?></span>
                </a>

                <div class="dropdown-divider"></div>
              
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End Topbar -->