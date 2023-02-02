<h1 class="h3 mb-3"><strong>Edit</strong> Kelas</h1>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <?php
        $id = $_GET['id'];
        $kelas = $dbConnect->prepare("CALL getKelasId($id)");
        $kelas->execute();
        $data = $kelas->fetch();
        ?>
        <form action="../controllers/kelasController.php?aksi=ubah" method="post">
          <input type="hidden" name="id" value="<?= $data['id_kelas'] ?>">
          <div class="form-group mb-2">
            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" value="<?= $data['nama_kelas'] ?>">
          </div>
          <div class="form-group mb-2">
            <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Kompetensi Keahlian" value="<?= $data['kompetensi_keahlian'] ?>">
          </div>
          <div class="form-group mb-2">
            <button class="btn btn-primary w-100">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>