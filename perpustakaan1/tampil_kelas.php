<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tampil_siswa.php">Data Siswa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tampil_kelas.php">Data Kelas</a>
    </li>
  </ul>
</nav>
<br>

<div class="container-fluid">

    <h3>Tampil Kelas</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
            <th>NO</th><th>KELAS</th><th>KELOMPOK</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_siswa=mysqli_query($conn, "select * from siswa join kelas on kelas.id_kelas = siswa.id_kelas");
            $no=0;
            while($data_siswa=mysqli_fetch_array($qry_siswa)){
            $no++;?>

            <tr>
                <td><?=$no?></td>
                <td><?=$data_siswa['nama_kelas']?></td>
                <td><?=$data_siswa['kelompok']?></td>
                <td><a href="#" onclick="return confirm('Maaf fitur tidak berfungsi untuk sementara')" class="btn btn-success">Ubah</a>
                <a href="#" onclick="return confirm('Maaf fitur tidak berfungsi untuk sementara')" class="btn btn-danger">Hapus</a></td>


            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="tambah_kelas.php" class="btn btn-success">Tambah Kelas</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>