<?php
include('../helper/request.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate Laporan</title>
</head>
<body onload="window.print()">

<div class="mb-3 d-flex">
  <h1 class="h3"><strong>Laporan</strong> SPP</h1>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table class="table" width="100%">
          <thead>
            <th>No</th>
            <th>Petugas</th>
            <th>Siswa</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Bayar</th>
            <th>Tahun Dibayar</th>
            <th>SPP</th>
            <th>Jumlah Bayar</th>
          </thead>
          <tbody>
            <?php foreach($prosesData->tampilData('pembayaran') as $no=>$data): ?>
            <?php
              $siswa = $prosesData->tampilDataId('siswa', 'nisn', $data['nisn']);
              $petugas = $prosesData->tampilDataId('petugas', 'id_petugas', $data['id_petugas']);
              $spp = $prosesData->tampilDataId('spp', 'id_spp', $data['id_spp']);
            ?>
              <tr>
                <td><?= $no+1 ?></td>
                <td><?= $petugas['nama_petugas'] ?></td>
                <td><?= $siswa['nama'] ?></td>
                <td><?= $data['tgl_bayar'] ?></td>
                <td><?= $data['bulan_bayar'] ?></td>
                <td><?= $data['tahun_dibayar'] ?></td>
                <td><?= $spp['tahun'].'- Rp.'.$spp['nominal'] ?></td>
                <td><?= $data['jumlah_bayar'] ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  
</body>
</html>