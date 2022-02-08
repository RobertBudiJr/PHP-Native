<?php
if($_POST){
    $nisn=$_POST['nisn'];
    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $no_telp=$_POST['no_telp'];

    if(empty($nama)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_data_siswa.php';</script>";

    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='ubah_data_siswa.php';</script>";
    } elseif(empty($no_telp)){
        echo "<script>alert('nomor telepon tidak boleh kosong');location.href='ubah_data_siswa.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into siswa (nisn, nis, nama, id_kelas, alamat, no_telp) value ('".$nisn."','".$nis."','".$nama."','".$id_kelas."','".$alamat."','".$no_telp."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan siswa');location.href='data_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan siswa');location.href='tambah_data_siswa.php';</script>";
        }
    }
}
?>
