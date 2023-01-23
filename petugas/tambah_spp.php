<h1 class="h3 mb-3"><strong>Tambah</strong> SPP</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="../controllers/sppController.php?aksi=tambah" method="post">
          <div class="form-group mb-2">
            <input type="text" name="tahun" class="form-control" placeholder="tahun">
          </div>
          <div class="form-group mb-2">
            <input type="number" name="nominal" class="form-control" placeholder="Nominal">
          </div>
          <div class="form-group mb-2">
            <button class="btn btn-primary w-100">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>