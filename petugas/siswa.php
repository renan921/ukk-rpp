<div class="mb-3 d-flex">
  <h1 class="h3"><strong>Daftar</strong> Siswa</h1>
  <div class="ms-auto">
    <a href="?page=tambah_siswa" class="btn btn-sm btn-success rounded">Tambah Siswa +</a>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php foreach($prosesData->tampilData('siswa') as $no=>$data): ?>
              <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nis'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $prosesData->tampilDataId('kelas', 'id_kelas', $data['id_kelas'])['nama_kelas'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['no_telp'] ?></td>
                <td>
                  <div class="d-flex gap-2 align-items-center">
                    <form action="../controllers/siswaController.php?aksi=delete" method="post">
                      <input type="hidden" name="nisn" value="<?= $data['nisn'] ?>">
                      <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="?page=edit_siswa&id=<?= $data['nisn'] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="?page=history_transaksi&id=<?= $data['nisn'] ?>" class="btn btn-sm btn-warning">History</a>
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