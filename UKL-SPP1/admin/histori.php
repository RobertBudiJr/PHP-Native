<?php
    include "koneksi.php";
error_reporting(0);

?>
<!doctype html>
<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.html?pesan=gagal");
}elseif ($_SESSION['level']!="Admin") {
  header("location:../index.html?pesan=gagal");
}
?>
<html lang="en">
  <head>
  	<title>Histori</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../tampil/css/style_admin.css" />
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
          <h1><a href="index.html" class="logo">SPPYesYes Admin</a></h1>
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
            <li>
              <a href="transaksi.php"><span class="fa fa-exchange mr-3"></span> Transaksi</a>
            </li>
            <li class="active">
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
        <section class="section">
          <div class="section-header">
        </div>
        <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>History Pembayaran</h4>
                    <div class="card-header-form">
                    </div>
                  </div>
        <form action="" method="get">
                      <table class="table">
                      <tr>
                      <td>NISN  :</td>
                      <td>
                      <input class="form-control" type="number" name="nisn" placeholder="--Masukan NISN--">
                      </td>
                      <td>
                      <button class="btn btn-success" type="submit" name="cari">Cari</button>
                      </td>
                      </tr>

                      </table>
                      </form>
                <?php 
                if (isset($_GET['nisn']) && $_GET['nisn']!='') {
                  $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
                  $data = mysqli_fetch_array($query);
                  $nisn = $data['nisn'];
                ?>

                <h2>DATA SISWA</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">NAMA SISWA</th>
                      <th scope="col">ID KELAS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['id_kelas']; ?></td>
                  </tbody>
                </table>

                <h2>DATA SPP SISWA</h2>
              <table class="table table-striped">
                <thead> 
                  <tr>
               
               <th scope="col"> NISN</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Bulan Bayar</th>
                <th scope="col">Tahun Bayar</th>             
                <th scope="col">Nominal Bayar</th>
                <th scope="col">Status</th>

                  </tr>
                </thead>

                <tbody>
                  <?php 
    
              
                  $query = mysqli_query($conn,"SELECT * FROM pembayaran WHERE nisn='$data[nisn]' ORDER BY bulan_spp ASC");
                  
                  

                  while ($data=mysqli_fetch_array($query)) {
                    
                
                    echo "<tr>
                 
                          <td>  $data[nisn]</td>
                          <td>  $data[tgl_bayar]</td>
                          <td>  $data[bulan_spp]</td>
                          <td>  $data[tahun_spp]</td>                        
                          <td>  $data[jumlah]</td>
                          <td>  $data[status]</td>


                        </tr>";
                        
                  }

                   ?>

                </tbody>

              </table>  
                
    <?php 
    }
    if(isset($_GET['lunas'])){
      $id = $_GET['id'];
      $ambilData = mysqli_query($conn, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp 
                                      WHERE id_pembayaran = '$id'");
      $row = mysqli_fetch_assoc($ambilData);
      $sisa = $row['nominal'] - $row['jumlah_bayar'];
      $hasil = $row['jumlah_bayar'] + $sisa;
      $update = mysqli_query($conn, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
      if($update){
          echo "<script>alert('Data Berhasil Ditambahkan !');location.href='../transaction/transaksi.php';</script>";
      }
  }
    ?>      
        
        </div>

        <script src="../tampil/js/jquery.min.js"></script>
    <script src="../tampil/js/popper.js"></script>
    <script src="../tampil/js/bootstrap.min.js"></script>
    <script src="../tampil/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>