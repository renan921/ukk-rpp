<h1 class="h3 mb-3"><strong>Edit</strong> SPP</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <?php
        $data = $prosesData->tampilDataId('spp', 'id_spp', $_GET['id']);
        ?>
        <form action="../controllers/sppController.php?aksi=ubah" method="post">
          <input type="hidden" name="id" value="<?= $data['id_spp'] ?>">
          <div class="form-group mb-2">
            <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="<?= $data['tahun'] ?>">
          </div>
          <div class="form-group mb-2">
            <input type="number" name="nominal" class="form-control" placeholder="Nominal" value="<?= $data['nominal'] ?>">
          </div>
          <div class="form-group mb-2">
            <button class="btn btn-primary w-100">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>