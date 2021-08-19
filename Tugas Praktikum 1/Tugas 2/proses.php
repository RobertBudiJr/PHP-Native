<?php
$nama = $_GET['nama'];
$jkl = $_GET['jkl'];
$agama = $_GET['agama'];
$tempat = $_GET['tempat'];
$tanggal = $_GET['tanggal'];
$hobi = $_GET['hobi'];
$cita = $_GET['cita'];
$usia = $_GET['usia'];
$asal = $_GET['asalSekolah'];

echo "Nama anda ".$nama;
echo "<br/>";
echo "Jenis kelamin anda ".$jkl;
echo "Agama anda ".$agama;
echo "<br/>";
echo "Lahir di ".$tempat;
echo "<br/>";
echo "Pada ".$tanggal;
echo "<br/>";
echo "Hobi anda ".$hobi;
echo "<br/>";
echo "Cita cita anda ".$cita;
echo "<br/>";
echo "Sekarang anda berusia ".$usia;
echo "<br/>";
echo "Asal sekolah anda ".$asal;
echo "<br/>";
?>