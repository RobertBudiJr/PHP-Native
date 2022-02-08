<!doctype html>
<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.html?pesan=gagal");
}elseif ($_SESSION['level']!="Petugas") {
  header("location:../index.hmtl?pesan=gagal");
}
?>
<html lang="en">
  <head>
  	<title>Transaksi</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../tampil/css/styl_petugas.css" />
</head>
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
            <li>
              <a href="data_spp.php"><span class="fa fa-briefcase mr-3"></span> Data SPP</a>
            </li>
            <li>
              <a href="data_petugas.php"><span class="fa fa-user mr-3"></span> Data Petugas</a>
            </li>
            <li class="active">
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
        <h3>Transaksi</h3>
 
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA PETUGAS</th>
                <th>NAMA SISWA</th>
                <th>TANGGAL BAYAR</th>
                <th>SPP BULAN</th>
                <th>SPP TAHUN</th>
                <th>NOMINAL DIBAYAR</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../admin/koneksi.php";
            $sql = 'SELECT * FROM siswa inner join kelas on kelas.id_kelas = siswa.id_kelas ;';
            $result = mysqli_query($conn, $sql);
            ?>
            <?php
                            include "../admin/koneksi.php";
                            $sql = mysqli_query($conn, "SELECT * FROM pembayaran
                            JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
                            JOIN siswa ON pembayaran.nisn = siswa.nisn
                            JOIN spp ON spp.id_spp
                            ORDER BY tgl_bayar ") or die(mysqli_error($conn));
                            $no = 1;
                            while($r = mysqli_fetch_array($sql)){ ?>   
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $r['nama_petugas']; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= $r['tgl_bayar']; ?></td>
                                <td><?= $r['bulan_spp']; ?></td>
                                <td><?= $r['tahun_spp'];?></td>
                                <td><?= " Rp. " . $r['jumlah']; ?></td>
                                <td><?= $r['status'];?></td>
                                <td><a href="ubah_transaksi.php?id_pembayaran=<?=$r['id_pembayaran']?>" class="btn btn-warning">Edit</a>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>
<a href="tambah_transaksi.php" type="button" class="btn btn-success">Tambah Data</a></h3>
<script src="../tampil/js/jquery.min.js"></script>
    <script src="../tampil/js/popper.js"></script>
    <script src="../tampil/js/bootstrap.min.js"></script>
    <script src="../tampil/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>