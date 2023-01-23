<?php

require('../helper/request.php');

if (empty($sesi['level'] == 'admin')) {
  die("403 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $data = array(
    'tahun' => $_POST['tahun'],
    'nominal' => $_POST['nominal']
  );

  $tambah = $prosesData->tambahData("spp", $data);
  if ($tambah) {
    header('location:../petugas?page=spp');
  } else {
    echo "Gagal menambahkan data";
  }
}

//hapus data
if (!empty($_GET['aksi'] == 'delete')) {
  $id = $_POST['id'];
  $hapus = $prosesData->hapusData("spp", "id_spp", $id);
  if ($hapus) {
    header('location:../petugas?page=spp');
  } else {
    echo "Gagal menghapus data";
  }
}

// untuk mengubah data
if (!empty($_GET['aksi'] == 'ubah')) {
  $data = array(
    'tahun' => $_POST['tahun'],
    'nominal' => $_POST['nominal']
  );

  $tambah = $prosesData->ubahData("spp", $data, "id_spp", $_POST['id']);
  if ($tambah) {
    header('location:../petugas?page=spp');
  } else {
    echo "Gagal ubah data";
  }
}

