<?php
if($_POST){
    $id_pembayaran=$_POST['id_pembayaran'];
    $nisn=$_POST['nisn'];
    $tgl_bayar = $_POST['tgl_bayar']; 
    $bulan_spp = $_POST['bulan_spp']; 
    $tahun_spp = $_POST['tahun_spp']; 
    $jumlah = $_POST['jumlah'];
    $status =$_POST['status'];

    if(empty($nisn)){
        echo "<script>alert('nama tidak boleh kosong');location.href='ubah_transaksi.php?id_pembayaran=".$id_pembayaran."';</script>";

    } elseif(empty($tgl_bayar)){
        echo "<script>alert('tanggal bayar tidak boleh kosong');location.href='ubah_transaksi.php?id_pembayaran=".$id_pembayaran."';</script>";
    } elseif(empty($bulan_spp)){
        echo "<script>alert('bulan tidak boleh kosong');location.href='ubah_transaksi.php?id_pembayaran=".$id_pembayaran."';</script>";
    } elseif(empty($tahun_spp)){
        echo "<script>alert('tahun tidak boleh kosong');location.href='ubah_transaksi.php?id_pembayaran=".$id_pembayaran."';</script>";
    } elseif(empty($jumlah)){
        echo "<script>alert('jumlah tidak boleh kosong');location.href='ubah_transaksi.php?id_pembayaran=".$id_pembayaran."';</script>";
    } else {
        include "koneksi.php";
        $update=mysqli_query($conn,"update pembayaran set nisn='".$nisn."', tgl_bayar='".$tgl_bayar."', bulan_spp='".$bulan_spp."',  tahun_spp='".$tahun_spp."', jumlah='".$jumlah."', status='".$status."' WHERE id_pembayaran = '".$id_pembayaran."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update transaksi');location.href='transaksi.php';</script>";
            } else {
                echo "<script>alert('Gagal update transaksi');location.href='ubah_transaksi.php?id_pembayaran=".$id_pembayaran."';</script>";
            }
        }  
}
?>