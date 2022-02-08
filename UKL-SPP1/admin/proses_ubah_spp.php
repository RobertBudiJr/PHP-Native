<?php
if($_POST){
    $id_spp=$_POST['id_spp'];
    $angkatan=$_POST['angkatan'];
    $tahun=$_POST['tahun'];
    $nominal=$_POST['nominal'];

    if(empty($angkatan)){
        echo "<script>alert('angkatan tidak boleh kosong');location.href='tambah_data_spp.php';</script>";

    } elseif(empty($tahun)){
        echo "<script>alert('tahun tidak boleh kosong');location.href='tambah_data_spp.php';</script>";
    } elseif(empty($nominal)){
        echo "<script>alert('nominal tidak boleh kosong');location.href='tambah_data_spp.php';</script>";
    } else {
        include "koneksi.php";
        $update=mysqli_query($conn,"update spp set angkatan='".$angkatan."', tahun='".$tahun."', nominal='".$nominal."' WHERE id_spp = '".$id_spp."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update SPP');location.href='data_spp.php';</script>";
            } else {
                echo "<script>alert('Gagal update SPP');location.href='ubah_data_spp.php?id_spp=".$id_spp."';</script>";
            }
        }  
}
?>