<?php

require('../helper/request.php');

if (empty($sesi['level'] == 'admin')) {
  die("403 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $nama_petugas = $_POST['nama_petugas'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $level = $_POST['level'];

  $tambah = $dbConnect->prepare("CALL tambahPetugas('$username', '$nama_petugas', '$level', '$password')");
  $tambah->execute();
  if ($tambah) {
    header('location:../petugas?page=petugas');
  } else {
    echo "Gagal menambahkan data";
  }
}

//hapus data
if (!empty($_GET['aksi'] == 'delete')) {
  $id = $_POST['id'];
  $hapus = $dbConnect->prepare("CALL hapusPetugas($id)");
  $hapus->execute();
  if ($hapus) {
    header('location:../petugas?page=petugas');
  } else {
    echo "Gagal menghapus data";
  }
}

// untuk mengubah data
if (!empty($_GET['aksi'] == 'ubah')) {
  $id = $_POST['id'];
  $nama_petugas = $_POST['nama_petugas'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $level = $_POST['level'];

  $update = $dbConnect->prepare("CALL updatePetugas($id, '$username', '$nama_petugas', '$level', '$password')");
  $update->execute();
  if ($update) {
    header('location:../petugas?page=petugas');
  } else {
    echo "Gagal ubah data";
  }
}

