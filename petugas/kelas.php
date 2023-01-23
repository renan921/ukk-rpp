<div class="mb-3 d-flex">
  <h1 class="h3"><strong>Daftar</strong> Kelas</h1>
  <div class="ms-auto">
    <a href="?page=tambah_kelas" class="btn btn-sm btn-success rounded">Tambah Kelas +</a>
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
            <th>Kompetensi Keahlian</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php foreach($prosesData->tampilData('kelas') as $no=>$data): ?>
              <tr>
                <td><?= $no+1 ?></td>
                <td><?= $data['nama_kelas'] ?></td>
                <td><?= $data['kompetensi_keahlian'] ?></td>
                <td>
                  <div class="d-flex gap-2 align-items-center">
                    <form action="../controllers/kelasController.php?aksi=delete" method="post">
                      <input type="hidden" name="id" value="<?= $data['id_kelas'] ?>">
                      <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="?page=edit_kelas&id=<?= $data['id_kelas'] ?>" class="btn btn-sm btn-primary">Edit</a>
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