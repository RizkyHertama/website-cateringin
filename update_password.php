<?php include("index_header.php") ?>

<?php 
// if(isset($_SESSION['members_email']) != ''){
//     header("location:index.php");
//     exit();
// }

$err    = "";
$sukses = "";

$email  = $_GET['email'];
$token  = $_GET['token'];

if($token == '' or $email == ''){
    $err .= "Link tidak valid. Email dan token tidak tersedia.";
}else{
    $sql1 ="select * from members where email = '$email' and token_ganti_password = '$token'";
    $q1   = mysqli_query($koneksi,$sql1);
    $n1   = mysqli_num_rows($q1);

    if($n1 < 1){
        $err .= "Link tidak valid. Email dan token tidak sesuai";
    }
}

if(isset($_POST['submit'])){
    $password   = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if($password == '' or $konfirmasi_password == ''){
        $err .= "Silakan masukkan password serta konfirmasi password";
    }elseif($konfirmasi_password != $password){
        $err .= "Konfirmasi password tidak sesuai dengan password";
    }elseif(strlen($password)<6){
        $err .= "Jumlah karakter yang diperbolehkan untuk password minimal 6 karakter";
    }

    if(empty($err)){
        $sql1 = "update members set token_ganti_password = '',password=md5($password) where email = '$email'";
        mysqli_query($koneksi,$sql1);
        $sukses = "Password telah berhasil diganti. Silahkan <a href='".url_dasar()."/login.php'>login</a>.";
    }
}
?>
<?php if($err){ echo "<div class='error'>$err</div>";}?>
<?php if($sukses){ echo "<div class='sukses'>$sukses</div>";}?>

<h3 class="log-sign">Ganti Password Baru</h3>
<div class="d-flex justify-content-center"> 
<form action="" method="POST">
    Silahkan masukkan password baru. 
    <table>
        <tr>
            <td class="label">Password</td>
            <td><input type="password" name="password" class="input" /></td>
        </tr>
        <tr>
            <td class="label">Konfirmasi Password</td>
            <td><input type="password" name="konfirmasi_password" class="input" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" name="submit" value="Ganti Password" class="tbl-biru"/>
            </td>
        </tr>
    </table>
</form>
</div>

<div class="foot-index">
<?php include("index_footer.php")?>
</div>