<?php  

  require_once("lib/php/koneksi.php");

  if ($proses->cekLoginPeminjam()) {
    // header("location:login.php");
    $peminjam = $proses->getPeminjam();
  }

  // var_dump($_SESSION);


  // var_dump($petugas);

  // var_dump($peminjam);

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>APLIKASI INVENTARIS SEKOLAH</title>

  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert.css">

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
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Logo -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?hal=home">
        <div class="sidebar-brand-icon">
          <img src="assets/img/logo.png" style="max-width: 100%">
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

      <?php 
              if (isset($peminjam)) {
                

            ?>

        <!-- Header -->
      <div class="sidebar-heading">
        Peminjaman
      </div>

      <!-- Menu bercabang -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#barang" aria-expanded="true" aria-controls="barang">
          <i class="fas fa-fw fa-cog"></i>
          <span>Data</span>
        </a>

        <div id="barang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?hal=belum">Belum Dikembalikan</a>
            <a class="collapse-item" href="index.php?hal=sudah">Sudah Dikembalikan</a>
            <a class="collapse-item" href="index.php?hal=riwayat">Riwayat Peminjaman</a>
            
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



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            



          <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- User -->

            <?php 
              if (isset($peminjam)) {
                

            ?>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-user"></span>
                <span class="ml-2 d-none d-lg-inline text-gray-600 small"><?php echo $peminjam['nama_peminjam']; ?></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <span class="kapital"><?php echo $peminjam['nama_jabatan']; ?></span>
                </a>
                <a class="dropdown-item" href="#">
                  <span class="kapital"><?php if ($peminjam['id_kelas'] == 1) {
                    echo "-";
                  }else { echo $peminjam['nama_kelas']; } ?></span>
                </a>

                <div class="dropdown-divider"></div>
              
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

            <?php
              }
              else {

              ?>

              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="login.php" >
                  <span class="fas fa-sign-in-alt"></span>
                  <span class="ml-2 d-none d-lg-inline text-gray-600 small"> Login</span>
                </a>

          
              
              </li>

              <?php


              }
            ?>

          </ul>

        </nav>
        <!-- End Topbar -->