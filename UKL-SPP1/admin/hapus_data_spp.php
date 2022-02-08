<?php 
    if($_GET['id_spp']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from spp where id_spp='".$_GET['id_spp']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus SPP');location.href='data_spp.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus SPP');location.href='data_spp.php';</script>";
        }
    }
?>