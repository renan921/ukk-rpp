<h1 class="h3 mb-3"><strong>Ubah</strong> siswa</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <?php $data = $prosesData->tampilDataId('siswa', 'nisn', $_GET['id']) ?>
        <form action="../controllers/siswaController.php?aksi=ubah" method="post">
          <div class="form-group mb-2">
            <input type="text" name="nisn" value="<?= $data['nisn'] ?>" class="form-control" placeholder="NISN">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="nis" value="<?= $data['nis'] ?>" class="form-control" placeholder="NIS">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" placeholder="nama">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="password" class="form-control" placeholder="password">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" placeholder="alamat">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="no_telp" value="<?= $data['no_telp'] ?>" class="form-control" placeholder="no_telp">
          </div>
          <div class="form-group mb-2">
            <select name="id_kelas" class="form-control" required>
              <?php foreach($prosesData->tampilData("kelas") as $kelas):  ?>
              <option value="<?= $kelas['id_kelas'] ?>" <?= $data['id_kelas'] != $kelas['id_kelas'] ?: 'selected' ?> >
                <?= $kelas['nama_kelas'] ?>
              </option>
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