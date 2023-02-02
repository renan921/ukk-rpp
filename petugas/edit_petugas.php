<h1 class="h3 mb-3"><strong>Edit</strong> petugas</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <?php
        $id = $_GET['id'];
        $petugas = $dbConnect->prepare("CALL getPetugasId($id)");
        $petugas->execute();
        $data = $petugas->fetch();
        ?>
        <form action="../controllers/petugasController.php?aksi=ubah" method="post">
          <input type="hidden" name="id" value="<?= $data['id_petugas'] ?>">
          <div class="form-group mb-2">
            <input type="text" name="nama_petugas" value="<?= $data['nama_petugas'] ?>" class="form-control" placeholder="Nama petugas">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" placeholder="Username">
          </div>
          <div class="form-group mb-2">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group mb-2">
            <select name="level" class="form-control">
              <option value="admin" <?= $data['level'] != 'admin' ?: 'selected' ?>>Admin</option>
              <option value="petugas" <?= $data['level'] != 'petugas' ?: 'selected' ?>>Petugas</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <button class="btn btn-primary w-100">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>