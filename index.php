<?php
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
?>

<?php
session_start();
if(isset($_SESSION['members_email']) != ''){ //sudah dalam keadaan login
    header("location:afterlogin.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
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
    <link href="css/style.css" rel="stylesheet" /><link>
    
    <!-- Aos Js -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Favicon Website -->
    <link rel="icon" href="gambar/logo cateringin.png" type="image/x-icon">

    <title>Cateringin</title></title>
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
       
          <img src="<?php echo ambil_gambar('11') ?>" alt="" width="124 px" height="64 px">
  

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2">
              <a id="nav-item-link" class="nav-link active"  aria-current="page" href="index.php">BERANDA</a>
            </li>
            <li class="nav-item mx-2">
              <a id="nav-item-link" class="nav-link active" href="login.php" class="nav-link" onclick="BelumLogin()">PESAN</a>
            </li>
            <li class="nav-item mx-2">
              <a id="nav-item-link" class="nav-link active" href="login.php" class="nav-link" onclick="BelumLogin()">RIWAYAT</a>
            </li>
          </ul>

   
          <a href="pendaftaran.php">
            <button class="button-secondary">MASUK</button>     
          </a>
    

        </div>
      </div>
    </nav>
   <!-- Navbar End -->

     

   <!-- Isi start -->
   <div class="wrapper">
       <div class="wrapper-one">
  
         <h1 id="wrapper-one-heading"> <?php echo ambil_judul('6') ?> </h1>
         <p id="wrapper-one-text"> <?php echo ambil_isi('6') ?> </p>
         <div class="wrapper-one-order-button">
           <div class="wrapper-one-order-button-order-button">
             <a class="order-button-link" href="login.php">
               <p id="wrapper-one-order-button-order-button-text" onclick="BelumLogin()">PESAN SEKARANG</p>
             </a>
           </div>
         </div>
       </div>
       
       <div class="wrapper-two mt-5">
         <div class="wrapper-two-food-image-one mt-5">
           <img src="<?php echo ambil_gambar('6') ?>" alt="Image Not Loaded">
         </div>
       </div>

      </div>
      <!-- Isi End -->
      

      <!-- Layanan Start -->
    <section id="layanan">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h2>Layanan Kami</h2>
          </div>
        </div>

        <div class="row mt-5 pt-4 gx-4 gy-4 text-center">
          
          <div class="col-md-4 text-center">
            <div class="card-layanan" data-aos="fade-up" data-aos-duration="2000">
                <img class="mt-4" src="<?php echo ambil_gambar('12') ?>" alt=""> 
              <H5><?php echo ambil_judul('12') ?></H5>
              <p><?php echo ambil_isi('12') ?> </p>
            </div>
          </div>

          <div class="col-md-4 text-center" >
            <div class="card-layanan" data-aos="fade-up" data-aos-duration="2000">
              
                <img class="mt-4" src="<?php echo ambil_gambar('13') ?>" alt=""> 
             
              <H5><?php echo ambil_judul('13') ?></H5>
              <p><?php echo ambil_isi('13') ?></p>
            </div>
          </div>

          <div class="col-md-4 text-center justify-content-center">
            <div class="card-layanan" data-aos="fade-up" data-aos-duration="2000">
                <img class="mt-4" src="<?php echo ambil_gambar('14') ?>"alt=""> 
              <H5><?php echo ambil_judul('14') ?></H5>
              <p><?php echo ambil_isi('14') ?></p>
            </div>
          </div>
      </div>
    </section>
    
      <!-- Layanan End -->

       <!-- Footer Start -->
       <div class="footer">
        <div class="footer-social-media">
           <a href="https://www.instagram.com/">
           <div id="footer-social-media-instagram"><img src="<?php echo ambil_gambar('15') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
           </a>

           <a href="https://facebook.com/">
           <div id="footer-social-media-facebook"><img src="<?php echo ambil_gambar('16') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
           </a>
         <a href="https://twitter.com/">
         <div id="footer-social-media-twitter"><img src="<?php echo ambil_gambar('17') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
         </a>
          
        </div>
        <span id="footer-copyright-text">COPYRIGHT 2022 CATERINGIN</span>
    </div>
     <!-- Footer End -->

     <!-- AOS JS -->
       <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
       <script>
         AOS.init();
       </script>  


    <!-- notifikasi.js -->
    <script src="notifikasi.js"></script>

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


