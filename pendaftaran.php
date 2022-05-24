<?php include("index_header.php")?>


<?php 
if(isset($_SESSION['members_email']) != ''){ //sudah dalam keadaan login
    header("location:afterlogin.php");
    exit();
}
?>


<?php 
$email        = "";
$nama_lengkap = "";
$err          = "";
$sukses       = "";

if(isset($_POST['simpan'])){
    $email               = $_POST['email'];
    $nama_lengkap        = $_POST['nama_lengkap'];
    $password            = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    //ngecek kalo data dalam from pendaftaran kosong
    if($email ==  '' or $nama_lengkap == '' or $konfirmasi_password == '' or $password == '' ){
        $err .= "<li>Silahkan isi semua data.</li>";
    }

    //cek di bagian db, apakah email sudah digunakan?
    if($email != ''){
        $sql1 = "select email from members where email = '$email'";
        $q1 =  mysqli_query($koneksi, $sql1);
        $n1   = mysqli_num_rows($q1);
        
        if($n1 > 0){
            $err .= "<li>Email yang kamu masukkan sudah terdaftar.</li>";
        }

        //validasi email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){            
            $err .= "<li>Email yang kamu masukkan tidak valid </li>";
        }
    }

    //cek apakah password sesuai dengan konfirmasi password
    if($password != $konfirmasi_password){
        $err .= "<li>Password dan konfirmasi password tidak sesuai</li>";
    }

    //validasi pengisian password
    if(strlen($password) < 6){
        $err .= "<li>Panjang karakter minimal untuk password adalah 6 karakter.";
    }

    if(empty($err)){
        $status         = md5(rand(0, 1000));
        $judul_email    = "Halaman Konfirmasi Pendaftaran";
        $isi_email      = "Halo <b>$nama_lengkap</b>, <br/><br/> Akun yang kamu miliki dengan email <b>$email</b> telah siap digunakan. <br/><br/>";
        $isi_email      .= "Selanjutnya, silahkan melakukan proses aktifasi akun melalui link dibawah ini : <br/></br>";
        $isi_email      .= url_dasar()."/verifikasi.php?email=$email&kode=$status";
        $isi_email      .= "<br/><br/> Hormat Kami, <br/> Cateringin <br/>";
        
        kirim_email($email, $nama_lengkap, $judul_email, $isi_email);

        $sql1 = "insert into members(email, nama_lengkap, password, status) values ('$email', '$nama_lengkap',  md5($password), '$status')";
        $q1   = mysqli_query($koneksi, $sql1);

        if($q1){
            $sukses = "Proses Berhasil, Silahkan periksa email kamu untuk melakukan verifikasi";
        }

    }
}
?>

<?php if($err){ echo "<div class='error'><ul>$err</ul></div>";} ?>
<?php if($sukses){ echo "<div class='sukses'>$sukses</div>";} ?>

<h3 class="log-sign">Pendaftaran</h3>

<form class="data-isian" action="" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td>
                <input type="text" name="email" class="input" value="<?php echo $email?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $nama_lengkap?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td>
                <input type="password" name="password" class="input" />
            </td>
        </tr>
        <tr>
            <td class="label">Konfirmasi Password</td>
            <td>
                <input type="password" name="konfirmasi_password" class="input" />
                <br/>
                Sudah punya akun? Silahkan <a href='<?php echo url_dasar()?>/login.php'>login</a>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" value="Daftar" class="tbl-biru" />
            </td>
        </tr>
    </table>
</form>

<div class="foot-index">
<?php include("index_footer.php")?>
</div>


