<?php

require('../helper/request.php');

// untuk login petugas
if (!empty($_GET['aksi'] == 'loginPetugas')) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $result = $dbConnect->prepare("CALL getLoginPetugas('$username', '$password')");
  $result->execute();

  $petugas = $result->fetch();
  $cek = $result->rowCount();
  if ($cek < 1) {
    echo "<script>alert('Login gagal'); window.location='../login.php'</script>";
  } else {
    $_SESSION['USER']['id'] = $petugas['id_petugas'];
    $_SESSION['USER']['tipe'] = 'petugas';

    header('location:../petugas');
  }
}

// untuk login siswa
if (!empty($_GET['aksi'] == 'loginSiswa')) {
  $nisn = $_POST['nisn'];
  $password = $_POST['password'];

  $result = $dbConnect->prepare("CALL getLoginSiswa('$nisn', '$password')");
  $result->execute();
  
  $siswa = $result->fetch();
  $cek = $result->rowCount();
  if ($cek < 1) {
    echo "<script>alert('Login gagal'); window.location='../login-siswa.php'</script>";
  } else {
    $_SESSION['USER']['id'] = $siswa['nisn'];
    $_SESSION['USER']['tipe'] = 'siswa';

    header('location:../siswa');
  }
}

if (!empty($_GET['aksi'] == 'logout')) {
  session_destroy();
  header('location:../login.php');
}