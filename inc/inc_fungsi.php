<?php
function url_dasar(){
    //$_SERVER['SERVER_NAME'] : menyimpan alamat website
    //$_SERVER['SCRIPT_NAME'] : menyimpan direktori website
    $url_dasar = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}

function ambil_gambar($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    $text = $r1['isi'];
    
    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
    $gambar = $img[1];
    $gambar = str_replace("../gambar/", url_dasar()."/gambar/",$gambar);
    return $gambar;
}

function ambil_kutipan($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = (isset($r1['kutipan'])) ? $r1['kutipan'] : '';
    $text = $r1['kutipan'];
    return $text;
}

function ambil_judul($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = isset($r1['judul']) ? $r1['judul'] : '';
    $text = $r1['judul'];
    return $text;
}

function ambil_isi($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = (isset($r1['isi'])) ? $r1['isi'] : '';
    $text = strip_tags($r1['isi']);
    return $text;
}

function ambil_gambar_riwayat($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman_riwayat where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    $text = $r1['isi'];
    
    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
    $gambar = $img[1];
    $gambar = str_replace("../gambar/", url_dasar()."/gambar/",$gambar);
    return $gambar;
}

function ambil_kutipan_riwayat($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman_riwayat where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = (isset($r1['kutipan'])) ? $r1['kutipan'] : '';
    $text = $r1['kutipan'];
    return $text;
}

function ambil_judul_riwayat($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman_riwayat where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = isset($r1['judul']) ? $r1['judul'] : '';
    $text = $r1['judul'];
    return $text;
}

function ambil_isi_riwayat($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman_riwayat where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = (isset($r1['isi'])) ? $r1['isi'] : '';
    $text = strip_tags($r1['isi']);
    return $text;
}

function ambil_gambar_pesan($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman_pesan where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    $text = $r1['isi'];
    
    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
    $gambar = $img[1];
    $gambar = str_replace("../gambar/", url_dasar()."/gambar/",$gambar);
    return $gambar;
}

function ambil_kutipan_pesan($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman_pesan where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = (isset($r1['kutipan'])) ? $r1['kutipan'] : '';
    $text = $r1['kutipan'];
    return $text;
}

function ambil_judul_pesan($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman_pesan where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = isset($r1['judul']) ? $r1['judul'] : '';
    $text = $r1['judul'];
    return $text;
}

function ambil_isi_pesan($id_tulisan){
    global $koneksi;
    $sql1 = "select * from halaman_pesan where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    // $text = (isset($r1['isi'])) ? $r1['isi'] : '';
    $text = strip_tags($r1['isi']);
    return $text;
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function kirim_email($email_penerima, $nama_penerima, $judul_email, $isi_email){
    
$email_pengirim   = "websitecateringin@gmail.com";
$nama_pengirim    = "Cateringin [noreply]";
    
//Load Composer's autoloader
require  getcwd().'/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug = 0;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $email_pengirim;                     //SMTP username
    $mail->Password   = 'gelkcwjnrhmliexh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email_pengirim, $nama_pengirim);
    $mail->addAddress($email_penerima,  $nama_penerima);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $judul_email;
    $mail->Body    = $isi_email;

    $mail->send();
    return "sukses";
} catch (Exception $e) {
    return "gagal: {$mail->ErrorInfo}";
}
}