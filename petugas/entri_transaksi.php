<h1 class="h3 mb-3"><strong>Entri</strong> transaksi</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="../controllers/transaksiController.php?aksi=tambah" method="post">
          <div class="form-group mb-2">
            <select name="nisn" class="form-control" required>
              <option disabled selected>Pilih Siswa</option>
              <?php foreach($prosesData->tampilData("siswa") as $siswa):  ?>
              <option value="<?= $siswa['nisn'] ?>"><?= $siswa['nama'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-2">
            <select name="id_spp" class="form-control" required>
              <option disabled selected>Pilih SPP</option>
              <?php foreach($prosesData->tampilData("spp") as $spp):  ?>
              <option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'].'- Rp.'.$spp['nominal'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-2">
            <label>Tanggal Bayar</label>
            <input type="date" name="tgl_bayar" class="form-control">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="bulan_bayar" class="form-control" placeholder="Bulan Bayar">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="tahun_dibayar" class="form-control" placeholder="Tahun Dibayar">
          </div>
          <div class="form-group mb-2">
            <input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar">
          </div>
          <div class="form-group mb-2">
            <button class="btn btn-primary w-100">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>