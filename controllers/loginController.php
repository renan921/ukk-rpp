<?php

require('../helper/request.php');

// untuk login petugas
if (!empty($_GET['aksi'] == 'loginPetugas')) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = $prosesData->prosesLogin('petugas', $username, $password);
  if ($result == "gagal") {
    echo "<script>alert('Login gagal'); window.location='../login.php'</script>";
  } else {
    $_SESSION['USER']['id'] = $result['id_petugas'];
    $_SESSION['USER']['tipe'] = 'petugas';

    header('location:../petugas');
  }
}

// untuk login siswa
if (!empty($_GET['aksi'] == 'loginSiswa')) {
  $nisn = $_POST['nisn'];
  $password = $_POST['password'];

  $result = $prosesData->prosesLogin('siswa', $nisn, $password);
  if ($result == "gagal") {
    echo "<script>alert('Login gagal'); window.location='../login-siswa.php'</script>";
  } else {
    $_SESSION['USER']['id'] = $result['nisn'];
    $_SESSION['USER']['tipe'] = 'siswa';

    header('location:../siswa');
  }
}

if (!empty($_GET['aksi'] == 'logout')) {
  session_destroy();
  header('location:../login.php');
}