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
            <?php
            $pembayaran = $dbConnect->prepare("CALL getPembayaran()");
            $pembayaran->execute();
            ?>
            <?php foreach($pembayaran->fetchAll() as $no=>$data): ?>
              <tr>
                <td><?= $no+1 ?></td>
                <td><?= $data['nama_petugas'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['tgl_bayar'] ?></td>
                <td><?= $data['bulan_bayar'] ?></td>
                <td><?= $data['tahun_dibayar'] ?></td>
                <td><?= $data['tahun'].'- Rp.'.$data['nominal'] ?></td>
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