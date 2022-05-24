<?php 
include("index_header.php");
error_reporting(0); // menghilangkan notif erorr php
?>

<?php 
if(isset($_SESSION['members_email']) != ''){ //sudah dalam keadaan login
    header("location:afterlogin.php");
    exit();
}
?>

<?php
$email      = "";
$password   = "";
$err        = "";

if(isset($_POST['login'])){
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    if($email == '' or $password == ''){
        $err .= "<li>Silakan isi semua data</li>";
    }else{
        $sql1   = "select * from members where email = '$email'";
        $q1     = mysqli_query($koneksi,$sql1);
        $r1     = mysqli_fetch_array($q1);
        $n1     = mysqli_num_rows($q1);

        if($r1['status'] != '1' && $n1 > 0){
            $err .= "<li>Akun yang kamu miliki belum aktif</li>";
        }

        if($r1['password'] != md5($password) && $n1 >0 && $r1['status'] == '1'){
            $err .= "<li>Password tidak sesuai</li>";
        }

        if($n1 < 1){
            $err .= "<li>Akun tidak ditemukan</li>";
        }

        if(empty($err)){
            $_SESSION['members_email'] = $email;
            $_SESSION['members_nama_lengkap'] = $r1['nama_lengkap'];
            
            header("location:afterlogin.php");
            exit();
        }
    }
}
?>

<?php if($err){ echo "<div class='error'><ul class='pesan'>$err</ul></div>";}?>
<h3 class="log-sign">Login</h3>
<form class="data-isian" action="" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td>
                <input type="text" name="email" class="input" value="<?php echo $email?>"/>
            </td>
        </tr>
        <tr>
            <td class="label mb-4">Password</td>
            <td>
                <input type="password" name="password" class="input mt-3" />
                <br/>
                Belum memiliki akun? Silahkan <a href='<?php echo url_dasar()?>/pendaftaran.php'>Daftar</a>
                <div class="mt-0">  
               
                Lupa password? Silahkan klik<a href='<?php echo url_dasar()?>/lupa_password.php'> disini.</a>
                </div>
            </td>
        </tr>
            <td></td>
            <td>
                <input type="submit" name="login" value="Login" class="tbl-biru" />
            </td>
        </tr>
    </table>
</form>

<div class="foot-index">
<?php include("index_footer.php")?>
</div>
