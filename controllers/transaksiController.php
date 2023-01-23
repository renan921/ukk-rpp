<?php

require('../helper/request.php');

if (empty($sesi['id_petugas'])) {
  die("404 - Permission Denied");
}

// untuk menambah data
if (!empty($_GET['aksi'] == 'tambah')) {
  $data = array(
    'id_petugas' => $sesi['id_petugas'],
    'nisn' => $_POST['nisn'],
    'id_spp' => $_POST['id_spp'],
    'tgl_bayar' => $_POST['tgl_bayar'],
    'bulan_bayar' => $_POST['bulan_bayar'],
    'tahun_dibayar' => $_POST['tahun_dibayar'],
    'jumlah_bayar' => $_POST['jumlah_bayar'],
  );
  $tambah = $prosesData->tambahData("pembayaran", $data);
  if ($tambah) {
    echo "<script>alert('Berhasil! Transaksi Ditambahkan'); window.location='../petugas?page=entri_transaksi'</script>";
  } else {
    echo "Gagal menambahkan data";
  }
}
