<?php

require('../helper/request.php');

if (empty($sesi['level'] == 'admin')) {
  die("403 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $data = array(
    'nisn' => $_POST['nisn'],
    'nis' => $_POST['nis'],
    'nama' => $_POST['nama'],
    'password' => md5($_POST['password']),
    'alamat' => $_POST['alamat'],
    'no_telp' => $_POST['no_telp'],
    'id_kelas' => $_POST['id_kelas'],
  );

  $tambah = $prosesData->tambahData("siswa", $data);
  if ($tambah) {
    header('location:../petugas?page=siswa');
  } else {
    echo "Gagal menambahkan data";
  }
}

//hapus data
if (!empty($_GET['aksi'] == 'delete')) {
  $id = $_POST['nisn'];
  $hapus = $prosesData->hapusData("siswa", "nisn", $id);
  if ($hapus) {
    header('location:../petugas?page=siswa');
  } else {
    echo "Gagal menghapus data";
  }
}

// untuk mengubah data
if (!empty($_GET['aksi'] == 'ubah')) {
  $data = array(
    'nisn' => $_POST['nisn'],
    'nis' => $_POST['nis'],
    'nama' => $_POST['nama'],
    'password' => md5($_POST['password']),
    'alamat' => $_POST['alamat'],
    'no_telp' => $_POST['no_telp'],
    'id_kelas' => $_POST['id_kelas'],
  );

  $tambah = $prosesData->ubahData("siswa", $data, "nisn", $_POST['nisn']);
  if ($tambah) {
    header('location:../petugas?page=siswa');
  } else {
    echo "Gagal ubah data";
  }
}

