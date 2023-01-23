<h1 class="h3 mb-3"><strong>Tambah</strong> siswa</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="../controllers/siswaController.php?aksi=tambah" method="post">
          <div class="form-group mb-2">
            <input type="text" name="nisn" class="form-control" placeholder="NISN">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="nis" class="form-control" placeholder="NIS">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="nama" class="form-control" placeholder="nama">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="password" class="form-control" placeholder="password">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="alamat" class="form-control" placeholder="alamat">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="no_telp" class="form-control" placeholder="no_telp">
          </div>
          <div class="form-group mb-2">
            <select name="id_kelas" class="form-control" required>
              <option disabled selected>Pilih kelas</option>
              <?php foreach($prosesData->tampilData("kelas") as $kelas):  ?>
              <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-2">
            <button class="btn btn-primary w-100">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>