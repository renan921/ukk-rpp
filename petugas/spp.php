<div class="mb-3 d-flex">
  <h1 class="h3"><strong>Daftar</strong> SPP</h1>
  <div class="ms-auto">
    <a href="?page=tambah_spp" class="btn btn-sm btn-success rounded">Tambah SPP +</a>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <th>No</th>
            <th>tahun</th>
            <th>nominal</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php
            $spp = $dbConnect->prepare("CALL getSpp()");
            $spp->execute();
            ?>
            <?php foreach($spp->fetchAll() as $no=>$data): ?>
              <tr>
                <td><?= $no+1 ?></td>
                <td><?= $data['tahun'] ?></td>
                <td><?= $data['nominal'] ?></td>
                <td>
                  <div class="d-flex gap-2 align-items-center">
                    <form action="../controllers/sppController.php?aksi=delete" method="post">
                      <input type="hidden" name="id" value="<?= $data['id_spp'] ?>">
                      <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="?page=edit_spp&id=<?= $data['id_spp'] ?>" class="btn btn-sm btn-primary">Edit</a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>