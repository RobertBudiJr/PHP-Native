<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <?php 
    include "koneksi.php";
    $qry_get_transaksi=mysqli_query($conn,"select * from pembayaran where id_pembayaran = '".$_GET['id_pembayaran']."'");
    $dt_transaksi=mysqli_fetch_array($qry_get_transaksi);
    ?>
    <h3>Edit Transaksi</h3>
    <form action="proses_ubah_transaksi.php" method="post">
    <input type="hidden" name="id_pembayaran" value="<?=$dt_transaksi['id_pembayaran']?>">

    Nama Siswa :
    <select name="nisn" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_siswa=mysqli_query($conn,"select * from siswa");
            while($data_siswa=mysqli_fetch_array($qry_siswa)){
                if($data_siswa['nisn']==$dt_transaksi['nisn']){
                    $selek="selected";
                } else {
                    $selek="";
                }
        echo '<option value="'.$data_siswa['nisn'].'" '.$selek.'>'.$data_siswa['nama'].'</option>';   
            }
            ?>
        </select>
    
    Tanggal Membayar :
    <input type="date" name="tgl_bayar"  placeholder="Tanggal / Bulan / Tahun." value="<?=$dt_transaksi['tgl_bayar']?>" class="form-control">

    SPP Bulan :
    <select type="text" name="bulan_spp" class="form-control">
            <option selected><?=$dt_transaksi['bulan_spp']?></option>
            <option>JANUARI</option>  
            <option>FEBRUARI</option> 
            <option>MARET</option> 
            <option>APRIL</option> 
            <option>MEI</option> 
            <option>JUNI</option>
            <option>JULI</option>
            <option>AGUSTUS</option>
            <option>SEPTEMBER</option>
            <option>OKTOBER</option>
            <option>NOVEMBER</option>
            <option>DESEMBER</option>
        </select>  

    SPP Tahun :
    <input type="number" name="tahun_spp" class="form-control" value="<?=$dt_transaksi['tahun_spp']?>" placeholder="Ketik Tahun ">

    Angkatan / Nominal yang Harus Dibayar :
    <select class="form-select form-select-sm" name="spp" aria-label=".form-select-sm example"> 
            <?php
            include "koneksi.php";
            $data_spp = mysqli_query($conn, "SELECT * FROM spp");
            while($r = mysqli_fetch_assoc($data_spp)){ ?>
            <option value="<?= $r['id_spp']; ?>">
            <?=  $r['angkatan'] ." | ".$r['nominal']; ?></option>
            <?php 
            } 
            ?>        
        </select> 
    
    Jumlah Bayar :
    <input type="number" name="jumlah" value="<?=$dt_transaksi['jumlah']?>" placeholder="1000000" class="form-control" >

    STATUS :
    <select name="status" class="form-control">
            <option><?=$dt_transaksi['status']?></option>
            <option value="LUNAS">LUNAS</option>
          </select>

    <a href="transaksi.php" class="btn btn-danger">Kembali</a>
    <button type="submit" style="margin-left: 30px;" class="btn btn-success" name="ubah">Simpan</button>