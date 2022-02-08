<?php
session_start();
session_destroy();
header("location: login_siswa.php");
?>