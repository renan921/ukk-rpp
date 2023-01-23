<h1 class="h3 mb-3"><strong>Tambah</strong> Kelas</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="../controllers/kelasController.php?aksi=tambah" method="post">
          <div class="form-group mb-2">
            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Kompetensi Keahlian">
          </div>
          <div class="form-group mb-2">
            <button class="btn btn-primary w-100">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>