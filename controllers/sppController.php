<?php

require('../helper/request.php');

if (empty($sesi['level'] == 'admin')) {
  die("403 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $tahun = $_POST['tahun'];
  $nominal = $_POST['nominal'];

  $tambah = $dbConnect->prepare("CALL tambahSpp('$tahun', '$nominal')");
  $tambah->execute();
  if ($tambah) {
    header('location:../petugas?page=spp');
  } else {
    echo "Gagal menambahkan data";
  }
}

//hapus data
if (!empty($_GET['aksi'] == 'delete')) {
  $id = $_POST['id'];
  $hapus = $dbConnect->prepare("CALL hapusSpp($id)");
  $hapus->execute();
  if ($hapus) {
    header('location:../petugas?page=spp');
  } else {
    echo "Gagal menghapus data";
  }
}

// untuk mengubah data
if (!empty($_GET['aksi'] == 'ubah')) {
  $tahun = $_POST['tahun'];
  $nominal = $_POST['nominal'];

  $update = $dbConnect->prepare("CALL updateSpp('$tahun', '$nominal')");
  $update->execute();
  if ($update) {
    header('location:../petugas?page=spp');
  } else {
    echo "Gagal ubah data";
  }
}

