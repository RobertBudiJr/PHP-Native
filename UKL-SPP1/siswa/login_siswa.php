<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/spp/admin/koneksi.php";
require_once($path);
if(isset($_SESSION['nisn'])){
    header("location: histori.php");
}
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <title>Login Siswa</title>
  </head>
<body>
    
<?php
// Kita akan membuat proses login nya disini
if(isset($_POST['login'])){
    $nisn = $_POST['nisn'];
    if($nisn == ""){
        echo "<script>alert('NISN kosong');location.href='login_siswa.php';</script>";
    }else{
    $connect = mysqli_connect('localhost','root','','bayar_spp');     
    $cari = mysqli_query($connect, "SELECT * FROM siswa WHERE nisn='$nisn'");
    $hasil = mysqli_fetch_assoc($cari);
        // Jika data yang dicari kosong
        if(mysqli_num_rows($cari) == 0){
            echo "<script>alert('nisn belum terdaftar!');location.href='login_siswa.php';</script>";
        }else{
        // Jika nisn siswa sesuai dengan database maka akan redirect ke halaman utama dan akan dibuatkan sesi
            $_SESSION['nisn'] = $_POST['nisn'];
            header("location: histori.php");
        }
    }
}
?>
<div class="row" style="margin-top: 50px">
      <div class="col-md"></div>
      <div class="col-md rounded bg-light" style="box-shadow: 4px 4px 5px -4px; padding: 10px">
        <form action="" method="POST">
          <h3 align="center">Login Siswa</h3>
          NISN :
          <input type="text" name="nisn" value="" class="form-control" />

          <a href="../index.html" class="href">Login sebagai Petugas</a><br />
          <br />
          <center><input type="submit" name="login" class="btn btn-success" value="LOG IN" /></center>
        </form>
      </div>
      <div class="col-md"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>