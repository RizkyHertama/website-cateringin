<?php
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
error_reporting(0); // menghilangkan notif erorr php
?>


<?php 
    if($_SESSION['members_email'] == ''){ //dia belum login
        header("location:login.php");
        exit();
    }
    ?>


<?php 
$email          = "";
$nama_lengkap   = "";
$alamat         = "";
$telepon        = "";
$err            = "";
$sukses         = "";

if(isset($_POST['simpan'])){
    $nama_lengkap     = $_POST['nama_lengkap'];
    $alamat           = $_POST['alamat'];
    $telepon           = $_POST['telepon'];


    if($nama_lengkap == ''){
        $err .= "<li>Silakan masukkan nama lengkap</li>";
    }

    if($alamat == ''){
      $err .= "<li>Silakan masukkan alamat</li>";
  }

  if($telepon == ''){
    $err .= "<li>Silakan masukkan nomor telepon</li>";
}

  //jika gaada error
    if(empty($err)){
        $sql1 = "update members set nama_lengkap = '".$nama_lengkap."', alamat = '".$alamat."' , telepon = '".$telepon."' where email = '".$_SESSION['members_email']."'";
        mysqli_query($koneksi,$sql1);
        $_SESSION['members_nama_lengkap'] = $nama_lengkap;
        $_SESSION['members_alamat'] = $alamat;
        $_SESSION['members_telepon'] = $telepon;
        $sukses = "Berhasil mempebarui profil";
    }

}
?>
<?php if($err) {echo "<div class='error'><ul>$err</ul></div>";} ?>
<?php if($sukses) {echo "<div class='sukses'>$sukses</div>";} ?>

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
              <a id="nav-item-link" class="nav-link active"  aria-current="page" href="afterlogin.php">BERANDA</a>
            </li>
            <li class="nav-item mx-2">
              <a id="nav-item-link" class="nav-link active" href="profile.php" class="nav-link">PROFILE PELANGGAN</a>
            </li>
            <li class="nav-item mx-2">
              <a id="nav-item-link" class="nav-link active" href="saldo.php" class="nav-link">ISI SALDO</a>
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
   <h3 class="log-sign">Profil Pelanggan</h3>
   

   <div class="d-flex justify-content-center"> 
   <form action="" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td>
            <input type="text" name="email" class="input" value=" <?php echo $_SESSION['members_email']?>" disabled/>
            </td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $_SESSION['members_nama_lengkap']?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Alamat Tinggal</td>
            <td>
                <input type="text" name="alamat" class="input" value="<?php echo $_SESSION['members_alamat']?>"/>  
            </td>
        </tr>
        <tr>
            <td class="label">Nomor Telepon</td>
            <td>
                <input type="text" name="telepon" class="input" value="<?php echo $_SESSION['members_telepon']?>"/>  
            </td>
            
        </tr>
            <td></td>
            <td>
          <div class="mt-3">    
          Silahkan klik <a href='<?php echo url_dasar()?>/ubah_password.php'>disini</a> untuk mengganti password.
          </div>
                <input type="submit" name="simpan" value="simpan" class="tbl-biru"/>
            </td>
        </tr>
    </table>
</form>
   </div>
  
   <!-- isi end -->
   

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

