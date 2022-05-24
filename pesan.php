<?php
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
?>

<?php 
    if($_SESSION['members_email'] == ''){ //dia belum login
        header("location:login.php");
        exit();
    }
    
    //kalo data alamat atau telepon belum diisi
    if(isset($_SESSION['members_alamat']) == '' or ($_SESSION['members_telepon']) == ''){ //sudah dalam keadaan login
      
      echo '<script type="text/javascript">
      alert("Silahkan lengkapi data diri untuk melakukan pemesanan.");
      window.location.href = "profile.php";
      </script>';
      
    }

    //kalo saldo kurang
    if(isset($_SESSION['members_saldo']) < '150000'){ //sudah dalam keadaan login
      
      echo '<script type="text/javascript">
      alert("Mohon maaf saldo tidak cukup untuk melakukan pemesanan");
      window.location.href = "saldo.php";
      </script>';
      
    }
?>

<?php
$makanan1   ="";
$makanan2   ="";
$makanan3   ="";
$makanan4   ="";
$makanan5   ="";
$catatan    ="";
$error      ="";
$sukses     ="";

if(isset($_POST['simpan'])){
  $makanan1   = $_POST['makanan1'];
  $makanan2   = $_POST['makanan2'];
  $makanan3   = $_POST['makanan3'];
  $makanan4   = $_POST['makanan4'];
  $makanan5   = $_POST['makanan5'];
  $catatan    = $_POST['catatan'];



//jika gaada error
  if(empty($err)){
      $sql1 = "update members set makanan1 = '".$makanan1."', makanan2 = '".$makanan2."' , makanan3 = '".$makanan3."' , makanan4 = '".$makanan4."' , makanan5 = '".$makanan5."' , catatan = '".$catatan."', tgl_pesan=now() where email = '".$_SESSION['members_email']."'";
      // $sql1 = "insert into members(makanan1, makanan2, makanan3, makanan4, makanan5, catatan) values ('$makanan1', '$makanan2',  '$makanan3', '$makanan4', '$makanan5', '$catatan') where email = '".$_SESSION['members_email']."'";
      mysqli_query($koneksi,$sql1);
      // $_SESSION['members_nama_lengkap'] = $nama_lengkap;
      // $_SESSION['members_alamat'] = $alamat;
      // $_SESSION['members_telepon'] = $telepon;


      $sukses = "Berhasil melakukan pesanan.";
  }

}

// if(isset($_GET['id'])){
//   $id = $_GET['id'];
// }else{
//   $id = "";
// }

// if($id != ""){
//   $sql1 = "select * from members where id = '$id'";
//   $q1   = mysqli_query($koneksi, $sql1);
//   $r1 = mysqli_fetch_array($q1);
//   $makanan1 = $r1['makanan1'];
//   $makanan2 = $r1['makanan2'];
//   $makanan3 = $r1['makanan3'];
//   $makanan4 = $r1['makanan4'];
//   $makanan5 = $r1['makanan5'];
//   $catatan  = $r1['catatan'];

//   if($makanan1 == '' or $makanan2 == '' or $makanan3 == '' or $makanan4 == '' or $makanan5 == ''){
//     $error = "Data tidak ditemukan";
//   }
// }

// if(isset($_POST['simpan'])){
//     $makanan1  = $_POST['makanan1'];
//     $makanan2  = $_POST['makanan2'];
//     $makanan3  = $_POST['makanan3'];
//     $makanan4  = $_POST['makanan4'];
//     $makanan5  = $_POST['makanan5'];
//     $catatan  = $_POST['catatan'];

//     if($makanan1 == '' or $makanan2 == '' or $makanan3 == '' or $makanan4 == '' or $makanan5 == '' or $catatan == ''){
//         $error = "Silahkan input semua data";
//     }
//     if(empty($error)){
//       if($id != ""){
//         $sql1 = "update members set makanan1 = '$makanan1', makanan2 = '$makanan2', makanan3 = '$makanan3', makanan4 = '$makanan4', makanan5 = '$makanan5',   catatan = '$catatan', tgl_isi=now() where id = '$id'";
//       }else{
//         $sql1   = "Insert into members(makanan1,makanan2, makanan3, makanan4, makanan5, catatan) values ('$makanan1','$makanan2','$makanan3','$makanan4','$makanan5', '$catatan' where email = '".$_SESSION['members_email']."')";
//       }

//         $q1     = mysqli_query($koneksi, $sql1);
//         if($q1){
//             $sukses = "Berhasil melakukan pemesanan!";
//         }
//         else{
//             $error = "Gagal melakukan pemesanan!";
//         }
//     }
// }


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
    
        <title>Page pesan</title>
    </head>
    <body>

     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">

          <img src="<?php echo ambil_gambar_pesan('9') ?>" alt="" width="124 px" height="64 px">
  

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
        <h1><?php echo ambil_judul_pesan('2') ?></h1>
    </div>

    <div class="catatan-text">
      <ul>
        <p><?php echo ambil_isi_pesan('2') ?></p>
        <li><?php echo ambil_isi_pesan('4') ?></li>
        <p><?php echo ambil_isi_pesan('5') ?></p>
        <li><?php echo ambil_isi_pesan('6') ?></li>
        <li><?php echo ambil_isi_pesan('7') ?></li>
        <li><?php echo ambil_isi_pesan('8') ?></li>
      </ul>
    </div>
   <!-- Isi End -->

         <!-- Menu Start -->
         <section id="menu">
          <div class="container">
            <div class="row">
              <div class="col-12 text-center">
                <h2><?php echo ambil_judul_pesan('9') ?></h2>
              </div>
            </div>
    
            <div class="row mt-5 pt-4 gx-4 gy-4 text-center">
              
              <div class="col-md-4 text-center">
                <div class="card-menu" data-aos="fade-up" data-aos-duration="2000">
                    <img class="makanan1" src="<?php echo ambil_gambar_pesan('10') ?>" alt=""> 
                  <H5><?php echo ambil_judul_pesan('10') ?></H5>
                </div>
              </div>

              <div class="col-md-4 text-center">
                <div class="card-menu" data-aos="fade-up" data-aos-duration="2000">
                    <img class="makanan2" src="<?php echo ambil_gambar_pesan('11') ?>" alt="" width="16rem"> 
                  <H5><?php echo ambil_judul_pesan('11') ?></H5>
                </div>
              </div>

              <div class="col-md-4 text-center">
                <div class="card-menu" data-aos="fade-up" data-aos-duration="2000">
                    <img class="makanan3" src="<?php echo ambil_gambar_pesan('12') ?>" alt=""> 
                  <H5><?php echo ambil_judul_pesan('12') ?></H5>
                </div>
              </div>
    
              <div class="col-md-4 text-center">
                <div class="card-menu" data-aos="fade-up" data-aos-duration="2000">
                    <img class="makanan4" src="<?php echo ambil_gambar_pesan('13') ?>" alt=""> 
                  <H5><?php echo ambil_judul_pesan('13') ?></H5>
                </div>
              </div>
              
              <div class="col-md-4 text-center">
                <div class="card-menu" data-aos="fade-up" data-aos-duration="2000">
                    <img class="makanan5" src="<?php echo ambil_gambar_pesan('14') ?>" alt=""> 
                  <H5><?php echo ambil_judul_pesan('14') ?></H5>
                </div>
              </div>

              <div class="col-md-4 text-center">
                <div class="card-menu" data-aos="fade-up" data-aos-duration="2000">
                    <img class="makanan6" src="<?php echo ambil_gambar_pesan('15') ?>" alt=""> 
                  <H5><?php echo ambil_judul_pesan('15')?></H5>
                </div>
              </div>
    
          </div>
        </section>
        
          <!-- Menu End -->

<?php
if($error){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
    <?php
}
?>

<?php
if($sukses){
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
    <?php
}
?>
          <form class="data-isian" action="" method="POST">
    <table>
        <tr>
            <td class="label">Makanan Hari Pertama</td>
            <td>
                <input type="text" class="form-control" name="makanan1" class="input" value="<?php echo $makanan1?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Makanan Hari Kedua</td>
            <td>
                <input type="text" class="form-control" name="makanan2" class="input" value="<?php echo $makanan2?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Makanan Hari Ketiga</td>
            <td>
                <input type="text"class="form-control"  name="makanan3" class="input" value="<?php echo $makanan3?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Makanan Hari Keempat</td>
            <td>
                <input type="text" class="form-control" name="makanan4" class="input" value="<?php echo $makanan4?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Makanan Hari Kelima</td>
            <td>
                <input type="text" class="form-control" name="makanan5" class="input" value="<?php echo $makanan5?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Catatan</td>
            <td>
                <input type="text" class="form-control" name="catatan" class="input" value="<?php echo $catatan?>"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" value="Pesan" class="tbl-biru" />
            </td>
        </tr>
    </table>
</form>
           <!-- Footer Start -->
           <div class="footer">
            <div class="footer-social-media">
              <div id="footer-social-media-instagram"><img src="<?php echo ambil_gambar_pesan('16') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
              <div id="footer-social-media-facebook"><img src="<?php echo ambil_gambar_pesan('17') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
              <div id="footer-social-media-twitter"><img src="<?php echo ambil_gambar_pesan('18') ?>" alt="Image Not Loaded" width="36px" height="36px"></div>
            </div>
            <span id="footer-copyright-text">COPYRIGHT 2022 CATERINGIN</span>
        </div>
         <!-- Footer End -->
    
             <!-- notifikasi.js -->
             <script src="notifikasi.js"></script>

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
    

