<?php
session_start();
if($_SESSION['admin_username'] == ''){ //jika mau akses halaman.php maka harus login dulu
    header("location:login_admin.php");
    exit();
}

include("../inc/inc_koneksi.php");
include("../inc/inc_fungsi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page Cateringin</title>

    <!-- Summernote bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- summernote-image-list Github -->
    <link href="../css/summernote-image-list.min.css">
    <script src="../js/summernote-image-list.min.js"></script>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <style>
      .image-list-content .col-lg-3 {width:100%;}
      .image-list-content img {float:left; width:20%;}
      .image-list-content p {float:left; padding-left:20px;}
      .image-list-item {padding:10px 0px 10px 0px;}

    </style>

  </head>
<body class="container">
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index_admin.php">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="halaman.php">Edit Halaman Utama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="halaman_pesan.php">Edit Halaman Pesan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="halaman_riwayat.php">Edit Halaman Riwayat</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="view_riwayat_members.php">View Riwayat Members</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="members.php">View Members</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="logout_admin.php">Logout>></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
    <main>