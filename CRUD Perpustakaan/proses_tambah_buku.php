<?php
if ($_POST) {
    $judul_buku=$_POST['judul_buku'];
    $penulis=$_POST['penulis'];
    $penerbit=$_POST['penerbit'];
    $deskripsi=$_POST['deskripsi'];
    if(empty ($judul_buku)) {
        echo "<script>alert('judul tidak boleh kosong');location.href='tambah_buku.php';</script>";
    } elseif(empty ($penulis)) {
        echo "<script>alert('nama penulis tidak boleh kosong');location.href='tambah_buku.php';</script>";
    } elseif(empty ($penerbit)) {
        echo "<script>alert('nama penerbit tidak boleh kosong');location.href='tambah_buku.php';</script>";
    } elseif(empty ($deskripsi)) {
        echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_buku.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into buku (judul_buku,penulis,penerbit,deskripsi) value (' ".$judul_buku."','".$penulis."','".$penerbit."','".$deskripsi."')");
            if($insert){
                echo "<script>alert ('Sukses menambahkan buku');location.href='tambah_buku.php';</script>";
            } else {
                echo "<script>alert ('Gagal menambahkan buku');location.href='tambah_buku.php';</script>";
            }
    }
}
?>