<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    
<div class="container-fluid">

<h3>Tambah Transaksi</h3>
        <form action="proses_tambah_transaksi.php" method="post">
        <div class="mb-3">
                    <span> Nama Petugas / Admin : </span>
                    <select class="form-select form-select-sm" name="nama_petugas" aria-label=".form-select-sm example">
                        <option selected>--Pilih Petugas--</option> 
                        <?php
                        include "koneksi.php";  
                        // Kita akan ambil Nama Petugas yang ada pada tabel Petugas
                        $data_petugas = mysqli_query($conn, "SELECT * FROM petugas");
                        while($r = mysqli_fetch_assoc($data_petugas)){ ?>
                        <option value="<?= $r['id_petugas']; ?>"><?= $r['nama_petugas']; ?></option>
                        <?php
                        } 
                        ?>
                    </select>
                </td>
            </select>
        </div>
        <br>
        <div class="mb-3">
            <span> NAMA SISWA : </span>
            <select type="text" name="nama" class="form-control">
                <?php
                include "koneksi.php";
                $data_siswa = mysqli_query($conn, "SELECT * FROM siswa");
                while($r = mysqli_fetch_assoc($data_siswa)){ ?>
                <option value="<?= $r['nisn']; ?>"><?= $r['nama']; ?></option>
                <?php
                }
                ?>         
            </select>
        </td>
    </div>
    <br> 
    <div class="mb-3">
        <span> Tanggal Membayar :  </span>
        <input type="date" name="tgl_bayar"  placeholder="Tanggal / Bulan / Tahun." class="form-control">      
    </div>
    <br>
    <div class="mb-3">
        <span> SPP Bulan :   </span>
        <select type="text" name="bulan_spp" class="form-control">
            <option selected>--Pilih Bulan--</option>
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
    </div>
    <br>
    <div class="mb-3">
        <span> SPP Tahun :   </span>
        <input type="number" name="tahun_spp" class="form-control" placeholder="Ketik Tahun ">   
    </div>
    <br>
    <div class="mb-3">
        <span> Angkatan / Nominal yang harus dibayar : </span>
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
    </div>
    <br>
    <div class="mb-3">
        <span> JUMLAH BAYAR : </span>
        <td><input type="number" name="jumlah" placeholder="1000000" class="form-control" >
    </div>
    <div class="mb-3">
        <span> STATUS : </span>
        <td> 
        <select name="status" class="form-control">
            <option></option>
            <option value="LUNAS">LUNAS</option>
          </select>
        </td>
    </div>
    <br>
    <a href="transaksi.php" class="btn btn-danger">Kembali</a>
    <button type="submit" style="margin-left: 30px;" class="btn btn-success" name="simpan">Tambah </button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>