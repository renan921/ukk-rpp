<h1 class="h3 mb-3"><strong>Tambah</strong> petugas</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="../controllers/petugasController.php?aksi=tambah" method="post">
          <div class="form-group mb-2">
            <input type="text" name="nama_petugas" class="form-control" placeholder="Nama petugas">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group mb-2">
            <select name="level" class="form-control">
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
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