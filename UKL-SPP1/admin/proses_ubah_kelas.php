<?php
if($_POST){
    $id_kelas=$_POST['id_kelas'];
    $nama_kelas=$_POST['nama_kelas'];
    $jurusan=$_POST['jurusan'];
    $angkatan=$_POST['angkatan'];

    if(empty($nama_kelas)){
        echo "<script>alert('nama kelas tidak boleh kosong');location.href='ubah_data_kelas.php';</script>";

    } elseif(empty($jurusan)){
        echo "<script>alert('jurusan tidak boleh kosong');location.href='ubah_data_kelas.php';</script>";
    } elseif(empty($angkatan)){
        echo "<script>alert('angkatan tidak boleh kosong');location.href='ubah_data_kelas.php';</script>";
    } else {
        include "koneksi.php";
        $update=mysqli_query($conn,"update kelas set nama_kelas='".$nama_kelas."', jurusan='".$jurusan."', angkatan='".$angkatan."' WHERE id_kelas = '".$id_kelas."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update kelas');location.href='data_kelas.php';</script>";
            } else {
                echo "<script>alert('Gagal update kelas');location.href='ubah_data_kelas.php?id_kelas=".$id_kelas."';</script>";
            }
        }  
}
?>
