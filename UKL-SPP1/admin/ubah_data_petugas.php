<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="widatah=device-widatah, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    <body>
    <div class="container-fluid">
        <?php
        include "koneksi.php";
        $qry_get_petugas= mysqli_query($conn, "select * from petugas where id_petugas = '".$_GET['id_petugas']."'" );
        $data_petugas = mysqli_fetch_array($qry_get_petugas);
        ?>
        <br><h3>Ubah Petugas</h3>
        <form action = "proses_ubah_petugas.php" method = "post">
            <input type="hidden" name="id_petugas" value="<?=$data_petugas['id_petugas']?>">
            Nama Petugas :
            <input type = "text" name = "nama_petugas" value = "<?php echo $data_petugas['nama_petugas']?>" class = "form-control">
            Username :
            <input type = "text" name = "username" value = "<?php echo $data_petugas['username']?>" class = "form-control">
            Password  :
            <input type = "password" name = "password" value = "<?php echo $data_petugas['password']?>" class = "form-control">
            Level :
            <select name = "level" class = "form-control">         
            <option>
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
            </option>
            </select><br> 
            <a href="data_petugas.php" class="btn btn-danger">Kembali</a>
            <input type = "submit" name = "simpan" value = "Ubah Petugas" class = "btn btn-primary">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
    </body>
</html>