<?php

require('../helper/request.php');

if (empty($sesi['level'] == 'admin')) {
  die("403 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $nisn = $_POST['nisn'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $password = md5($_POST['password']);
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $id_kelas = $_POST['id_kelas'];

  $tambah = $dbConnect->prepare("CALL tambahSiswa('$nisn', '$nis', '$nama', '$password', '$alamat', '$no_telp', '$id_kelas')");
  $tambah->execute();

  if ($tambah) {
    header('location:../petugas?page=siswa');
  } else {
    echo "Gagal menambahkan data";
  }
}

//hapus data
if (!empty($_GET['aksi'] == 'delete')) {
  $id = $_POST['nisn'];
  $hapus = $dbConnect->prepare("CALL hapusSiswa('$id')");
  if ($hapus) {
    header('location:../petugas?page=siswa');
  } else {
    echo "Gagal menghapus data";
  }
}

// untuk mengubah data
if (!empty($_GET['aksi'] == 'ubah')) {
  $nisn = $_POST['nisn'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $password = md5($_POST['password']);
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $id_kelas = $_POST['id_kelas'];

  $update = $dbConnect->prepare("CALL updateSiswa('$nisn', '$nis', '$nama', '$password', '$alamat', '$no_telp', '$id_kelas')");
  $update->execute();
  if ($update) {
    header('location:../petugas?page=siswa');
  } else {
    echo "Gagal ubah data";
  }
}

