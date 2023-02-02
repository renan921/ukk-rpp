<?php

require('../helper/request.php');

if (empty($sesi['level'] == 'admin')) {
  die("403 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $namaKelas = $_POST['nama_kelas'];
  $kompetensi = $_POST['kompetensi_keahlian'];
  $tambah = $dbConnect->prepare("CALL tambahKelas('$namaKelas', '$kompetensi')");
  $tambah->execute();
  if ($tambah) {
    header('location:../petugas?page=kelas');
  } else {
    echo "Gagal menambahkan data";
  }
}

//hapus data
if (!empty($_GET['aksi'] == 'delete')) {
  $id = $_POST['id'];
  $hapus = $dbConnect->prepare("CALL hapusKelas($id)");
  $hapus->execute();
  if ($hapus) {
    header('location:../petugas?page=kelas');
  } else {
    echo "Gagal menghapus data";
  }
}

// untuk mengubah data
if (!empty($_GET['aksi'] == 'ubah')) {
  $id = $_POST['id'];
  $namaKelas = $_POST['nama_kelas'];
  $kompetensi = $_POST['kompetensi_keahlian'];
  $update = $dbConnect->prepare("CALL updateKelas($id, '$namaKelas', '$kompetensi')");
  $update->execute();
  if ($update) {
    header('location:../petugas?page=kelas');
  } else {
    echo "Gagal ubah data";
  }
}

