<?php
if($_POST){
    $nisn=$_POST['nisn'];
    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $no_telp=$_POST['no_telp'];

    if(empty($nama)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='ubah_data_siswa.php';</script>";

    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='ubah_data_siswa.php';</script>";
    } elseif(empty($no_telp)){
        echo "<script>alert('nomor telepon tidak boleh kosong');location.href='ubah_data_siswa.php';</script>";
    } else {
        include "koneksi.php";
        $update=mysqli_query($conn,"update siswa set nama='".$nama."',id_kelas='".$id_kelas."', alamat='".$alamat."', alamat='".$alamat."', no_telp='".$no_telp."' where nisn = '".$nisn."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='data_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_data_siswa.php?nisn=".$nisn."';</script>";
            }
        }  
}
?>
