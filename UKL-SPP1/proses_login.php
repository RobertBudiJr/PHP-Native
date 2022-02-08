<?php 
session_start(); 
 $conn = mysqli_connect('localhost','root','','bayar_spp'); 
 $username = stripslashes($_POST['username']); 
 $password = md5($_POST['password']); 
$query = "SELECT * FROM petugas where username='$username' AND password='$password'"; 
$row = mysqli_query($conn,$query); 
$data = mysqli_fetch_array($row);  
$cek = mysqli_num_rows($row);

if($cek > 0){
 if($data['level']== 'Admin'){ 
     $_SESSION['level']='Admin'; 
     $_SESSION['username'] = $data['username']; 
     $_SESSION['id_petugas'] = $data['id_petugas']; 
     header('location:  admin/data_siswa.php'); 
    }else if($data['level'] =='Petugas'){
    $_SESSION['level']='Petugas';
    $_SESSION['username'] = $data['username'];
    $_SESSION['id_petugas']= $data['id_petugas']; 
    header('location: petugas/data_petugas.php'); 
    }else if($data['level'] =='Siswa'){
      $_SESSION['level']='Siswa';
      $_SESSION['username'] = $data['username'];
      $_SESSION['id_petugas']= $data['id_petugas']; 
      header('location: petugas/data_petugas.php'); 
      }
  }else{
       $msg = 'Username Atau Password Salah';
        header('location:index.html?msg='.$msg); }