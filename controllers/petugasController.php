<?php

require('../helper/request.php');

if (empty($sesi['level'] == 'admin')) {
  die("403 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $data = array(
    'nama_petugas' => $_POST['nama_petugas'],
    'username' => $_POST['username'],
    'password' => md5($_POST['password']),
    'level' => $_POST['level']
  );

  $tambah = $prosesData->tambahData("petugas", $data);
  if ($tambah) {
    header('location:../petugas?page=petugas');
  } else {
    echo "Gagal menambahkan data";
  }
}

//hapus data
if (!empty($_GET['aksi'] == 'delete')) {
  $id = $_POST['id'];
  $hapus = $prosesData->hapusData("petugas", "id_petugas", $id);
  if ($hapus) {
    header('location:../petugas?page=petugas');
  } else {
    echo "Gagal menghapus data";
  }
}

// untuk mengubah data
if (!empty($_GET['aksi'] == 'ubah')) {
  $data = array(
    'nama_petugas' => $_POST['nama_petugas'],
    'username' => $_POST['username'],
    'password' => md5($_POST['password']),
    'level' => $_POST['level']
  );

  $tambah = $prosesData->ubahData("petugas", $data, "id_petugas", $_POST['id']);
  if ($tambah) {
    header('location:../petugas?page=petugas');
  } else {
    echo "Gagal ubah data";
  }
}

