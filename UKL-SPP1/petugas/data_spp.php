<!DOCTYPE html>
<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.html?pesan=gagal");
}elseif ($_SESSION['level']!="Petugas") {
  header("location:../index.html?pesan=gagal");
}
?>
<html lang="en">
  <head>
    <title>Data Siswa</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../tampil/css/styl_petugas.css" />
<body>

<div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar" class="active">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4">
          <h1><a href="index.html" class="logo">SPPYesYes Petugas</a></h1>
          <ul class="list-unstyled components mb-5">
          <li>
              <a href="data_siswa.php"><span class="fa fa-user mr-3"></span> Data Siswa</a>
            </li>
            <li>
              <a href="data_kelas.php"><span class="fa fa-home mr-3"></span> Data Kelas</a>
            </li>
            <li class="active">
              <a href="data_spp.php"><span class="fa fa-briefcase mr-3"></span> Data SPP</a>
            </li>
            <li>
              <a href="data_petugas.php"><span class="fa fa-user mr-3"></span> Data Petugas</a>
            </li>
            <li>
              <a href="transaksi.php"><span class="fa fa-exchange mr-3"></span> Transaksi</a>
            </li>
            <li>
              <a href="histori.php"><span class="fa fa-history mr-3"></span> Histori</a>
            </li>
            <li>
              <a href="../logout.php"><span class="fa fa-close mr-3"></span> Logout</a>
            </li>
          </ul>


          <div class="footer">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </nav>

      <div id="content" class="p-4 p-md-5 pt-5">

    <h3>Data SPP</h3> 
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>ANGKATAN</th>
                <th>TAHUN</th>
                <th>NOMINAL</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "../admin/koneksi.php";
$qry_spp=mysqli_query($conn,"select * from spp ORDER BY `spp`.`id_spp` ASC");
            $no=0;
            while($data_spp=mysqli_fetch_array($qry_spp)){
            $no++;?>
        <tr>              
            <td><?=$no?></td>
            <td><?=$data_spp['angkatan']?></td>
            <td><?=$data_spp['tahun']?></td>
            <td><?=$data_spp['nominal']?></td>

            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <script src="../tampil/js/jquery.min.js"></script>
    <script src="../tampil/js/popper.js"></script>
    <script src="../tampil/js/bootstrap.min.js"></script>
    <script src="../tampil/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>