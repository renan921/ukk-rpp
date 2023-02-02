<?php

require('../request.php');

if (empty($sesi['id_petugas'])) {
  die("404 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $id_petugas = $sesi['id_petugas'];
  $nisn = $_POST['nisn'];
  $id_spp = $_POST['id_spp'];
  $tgl_bayar = $_POST['tgl_bayar'];
  $bulan_bayar = $_POST['bulan_bayar'];
  $tahun_dibayar = $_POST['tahun_dibayar'];
  $jumlah_bayar = $_POST['jumlah_bayar'];

  $tambah = $dbConnect->prepare("CALL tambahPembayaran('$id_petugas', '$nisn', '$id_spp', '$tgl_bayar', '$bulan_bayar', '$tahun_dibayar', '$jumlah_bayar')");
  $tambah->execute();
  if ($tambah) {
    echo "<script>alert('Berhasil! Transaksi Ditambahkan'); window.location='../petugas?page=entri_transaksi'</script>";
  } else {
    echo "Gagal menambahkan data";
  }
}
