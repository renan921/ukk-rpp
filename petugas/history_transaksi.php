<div class="mb-3 d-flex">
  <h1 class="h3"><strong>History</strong> Transaksi SPP Siswa</h1>
</div>

<?php $siswa = $prosesData->tampilDataId('siswa', 'nisn', $_GET['id']) ?>

<div class="row">
  <div class="col-3">
    <div class="card">
      <div class="card-body">
        <h1 class="h3">Biodata Siswa</h1>
        <ul>
          <li>NISN : <?= $siswa['nisn'] ?></li>
          <li>NIS : <?= $siswa['nis'] ?></li>
          <li>Nama : <?= $siswa['nama'] ?></li>
          <li>Kelas : <?= $prosesData->tampilDataId('kelas', 'id_kelas', $siswa['id_kelas'])['nama_kelas'] ?></li>
          <li>Alamat : <?= $siswa['alamat'] ?></li>
          <li>No Telp : <?= $siswa['no_telp'] ?></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-9">
    <div class="card">
      <div class="card-body">
        <h1 class="h3">History</h1>
        <table class="table">
          <thead>
            <th>No</th>
            <th>Petugas</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Bayar</th>
            <th>Tahun Dibayar</th>
            <th>SPP</th>
            <th>Jumlah Bayar</th>
          </thead>
          <tbody>
            <?php foreach($prosesData->tampilDataIdAll('pembayaran', 'nisn', $siswa['nisn']) as $no=>$data): ?>
            <?php
              $petugas = $prosesData->tampilDataId('petugas', 'id_petugas', $data['id_petugas']);
              $spp = $prosesData->tampilDataId('spp', 'id_spp', $data['id_spp']);
            ?>
              <tr>
                <td><?= $no+1 ?></td>
                <td><?= $petugas['nama_petugas'] ?></td>
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