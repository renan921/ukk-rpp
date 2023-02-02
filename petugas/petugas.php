<div class="mb-3 d-flex">
  <h1 class="h3"><strong>Petugas</strong></h1>
  <div class="ms-auto">
    <a href="?page=tambah_petugas" class="btn btn-sm btn-success rounded">Tambah Petugas +</a>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php
            $petugas = $dbConnect->prepare("CALL getPetugas()");
            $petugas->execute();
            ?>
            <?php foreach($petugas->fetchAll() as $no=>$data): ?>
              <tr>
                <td><?= $no+1 ?></td>
                <td><?= $data['nama_petugas'] ?></td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['level'] ?></td>
                <td>
                  <div class="d-flex gap-2 align-items-center">
                    <form action="../controllers/petugasController.php?aksi=delete" method="post">
                      <input type="hidden" name="id" value="<?= $data['id_petugas'] ?>">
                      <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="?page=edit_petugas&id=<?= $data['id_petugas'] ?>" class="btn btn-sm btn-primary">Edit</a>
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