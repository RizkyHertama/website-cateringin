<?php include("index_header.php") ?>

<?php 
// if(isset($_SESSION['members_email']) != ''){
//     header("location: index.php");
//     exit();
// }

$err    = "";
$sukses = "";
$email  = "";

if(isset($_POST['submit'])){
    $email  = $_POST['email'];
    if($email == ''){
        $err = "Silakan masukkan email";
    }else{
        $sql1 = "select * from members where email = '$email'";
        $q1   = mysqli_query($koneksi,$sql1);
        $n1   = mysqli_num_rows($q1);

        if($n1 < 1){
            $err = "Email: <b>$email</b> tidak ditemukan";
        }
    }

    if(empty($err)){
        $token_ganti_password   = md5(rand(0,1000));
        $judul_email            = "Konfirmasi Penggantian Password";
        $isi_email              = "Halo <b>$email</b>, <br/><br/>Seseorang meminta untuk melakukan perubahan password. <br/> Silakan klik link di bawah ini untuk melakukan penggantian password:<br/>";
        $isi_email              .= url_dasar()."/update_password.php?email=$email&token=$token_ganti_password";
        $isi_email              .= "<br/><br/> Hormat Kami, <br/> Cateringin <br/>";
        kirim_email($email,$email,$judul_email,$isi_email);

        $sql1     = "update members set token_ganti_password = '$token_ganti_password' where email = '$email'";
        mysqli_query($koneksi,$sql1);
        $sukses  ="Link ganti password sudah dikirimkan ke email anda.";
    }
}
?>
<?php if($err){ echo "<div class='error'>$err</div>";}?>
<?php if($sukses){ echo "<div class='sukses'>$sukses</div>";}?>
<h3 class="log-sign">Lupa Password</h3>
<div class="d-flex justify-content-center"> 
<form action="" method="POST">
    <table>
        <tr>
            Silahkan mengisi email yang didaftarkan untuk mendapatkan informasi lebih lanjut.
            <td class="label col-sm-1">Email</td>
            <td><input type="text" name="email" class="input" value="<?php echo $email ?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" name="submit" value="Kirim" class="tbl-biru"/>
            </td>
        </tr>
    </table>
</form>
</div>
<div class="foot-index">
<?php include("index_footer.php")?>
</div>
