<?php
if($_POST){
    $id_petugas=$_POST['id_petugas'];
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];

    if(empty($nama_petugas)){
        echo "<script>alert('nama_petugas tidak boleh kosong');location.href='ubah_data_petugas.php?id_petugas=".$id_petugas."';</script>";

    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='ubah_data_petugas.php?id_petugas=".$id_petugas."';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='ubah_data_petugas.php?id_petugas=".$id_petugas."';</script>";
    } elseif(empty($level)){
        echo "<script>alert('level tidak boleh kosong');location.href='ubah_data_petugas.php?id_petugas=".$id_petugas."';</script>";
    } else {
        include "koneksi.php";
        $update=mysqli_query($conn,"update petugas set nama_petugas='".$nama_petugas."', username='".$username."', password='".md5($password)."',  level='".$level."' WHERE id_petugas = '".$id_petugas."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update petugas');location.href='data_petugas.php';</script>";
            } else {
                echo "<script>alert('Gagal update petugas');location.href='ubah_data_petugas.php?id_petugas=".$id_petugas."';</script>";
            }
        }  
}
?>
