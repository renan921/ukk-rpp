<?php

require('../helper/request.php');

if (empty($sesi['level'] == 'admin')) {
  die("403 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $data = array(
    'nama_kelas' => $_POST['nama_kelas'],
    'kompetensi_keahlian' => $_POST['kompetensi_keahlian']
  );

  $tambah = $prosesData->tambahData("kelas", $data);
  if ($tambah) {
    header('location:../petugas?page=kelas');
  } else {
    echo "Gagal menambahkan data";
  }
}

//hapus data
if (!empty($_GET['aksi'] == 'delete')) {
  $id = $_POST['id'];
  $hapus = $prosesData->hapusData("kelas", "id_kelas", $id);
  if ($hapus) {
    header('location:../petugas?page=kelas');
  } else {
    echo "Gagal menghapus data";
  }
}

// untuk mengubah data
if (!empty($_GET['aksi'] == 'ubah')) {
  $data = array(
    'nama_kelas' => $_POST['nama_kelas'],
    'kompetensi_keahlian' => $_POST['kompetensi_keahlian']
  );

  $tambah = $prosesData->ubahData("kelas", $data, "id_kelas", $_POST['id']);
  if ($tambah) {
    header('location:../petugas?page=kelas');
  } else {
    echo "Gagal ubah data";
  }
}

