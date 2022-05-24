<?php
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <!-- Font Poppins Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
        
        <!-- Connect CSS -->
        <link href="./css/pesan.css" rel="stylesheet" /><link>
        <link href="./css/style.css" rel="stylesheet" /><link>
        <!-- Aos Js -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
        <!-- Favicon Website -->
        <link rel="icon" href="gambar/logo cateringin.png" type="image/x-icon">
    
        <title>Page Riwayat</title>
    </head>
    <body>

     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">

          <img src="<?php echo ambil_gambar_riwayat('1') ?> " alt="" width="124 px" height="64 px">
  

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2">
              <a id="nav-item-link" class="nav-link active"  aria-current="page" href="afterlogin.php">BERANDA</a>
            </li>
            <li class="nav-item mx-2">
              <a id="nav-item-link" class="nav-link active" href="pesan.php" class="nav-link">PESAN</a>
            </li>
            <li class="nav-item mx-2">
              <a id="nav-item-link" class="nav-link active" href="riwayat.php" class="nav-link">RIWAYAT</a>
            </li>
          </ul>

          <?php if(isset($_SESSION['members_nama_lengkap'])){
                        echo "<a href='".url_dasar()."/profile.php'>".$_SESSION['members_nama_lengkap']."</a>  | <a href='".url_dasar()."/logout.php'>Logout</a>";
                    }
                else{
                ?>
                  <a href="pendaftaran.php">
                  <button class="button-secondary">MASUK</button>     
                  </a>
                <?php
                }
          ?>

        </div>
      </div>
    </nav>
   <!-- Navbar End -->

    <!-- isi start -->
    <div class="judul-text">
        <h1><?php echo ambil_judul_riwayat('1') ?></h1>
    </div>
       <!-- Isi End -->

       <table class="table table-stripped" style="font-size: 14px">
            <thead>
                <tr>
                    <th>Waktu pesan</th>
                    <th>Hari1</th>
                    <th>Hari2</th>
                    <th>Hari3</th>
                    <th>Hari4</th>
                    <th>Hari5</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
       <?php
                $sqltambahan = "";
                $per_halaman = 2;
                // untuk menampilkan data halaman admin
                $sql1 = "select * from members $sqltambahan where email = '".$_SESSION['members_email']."'";
                $page = isset($_GET['page'])?(int)$_GET['page']:1;
                $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
                $q1    = mysqli_query($koneksi, $sql1);
                $total = mysqli_num_rows($q1);
                $pages = ceil($total / $per_halaman);
                $nomor = $mulai + 1;
                $sql1 = $sql1."order by id desc limit $mulai, $per_halaman";

                $q1   = mysqli_query($koneksi, $sql1);
                $nomor = 1;
                while($r1 = mysqli_fetch_array($q1)){
                    ?>
                <tr>
              
                    <td><?php echo $r1['tgl_pesan']?></td>
                    <td><?php echo $r1['makanan1']?></td>
                    <td><?php echo $r1['makanan2']?></td>
                    <td><?php echo $r1['makanan3']?></td>
                    <td><?php echo $r1['makanan4']?></td>
                    <td><?php echo $r1['makanan5']?></td>
                    <td><?php echo $r1['catatan']?></td>

                </tr>
                    <?php
                }

                ?>

                            
            </tbody>
        </table>


<!-- Footer Start -->
<div class="footer">
            <div class="footer-social-media">
              <div id="footer-social-media-instagram"><img src="<?php echo ambil_gambar_riwayat('2') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
              <div id="footer-social-media-facebook"><img src="<?php echo ambil_gambar_riwayat('3') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
              <div id="footer-social-media-twitter"><img src="<?php echo ambil_gambar_riwayat('4') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
            </div>
            <span id="footer-copyright-text">COPYRIGHT 2022 CATERINGIN</span>
        </div>
         <!-- Footer End -->
    
         <!-- AOS JS -->
           <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
           <script>
             AOS.init();
           </script>  
    
        <!-- Optional JavaScript; choose one of the two! -->
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
      </body>
    </html>
    

