<?php
if(empty($_SESSION)){
  session_start();
}

if (empty($_SESSION["USER"]['tipe'] == 'siswa')) {
  header('location:../login-siswa.php');
} else {
  require('../helper/request.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../assets/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Siswa - SPP Online</title>

	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="main">

			<main class="content">
				<div class="container-fluid p-0">
          <div class="d-flex">
            <h1 class="h3">Haloo, <?= $sesi['nama'] ?></h1>
            <div class="ms-auto">
              <a class="btn btn-danger" href="../controllers/loginController.php?aksi=logout">Log out</a>
            </div>
          </div>

          <div class="card mt-5">
            <div class="card-body">
              <h1 class="h3">History Transaksi</h1>
              <table class="table">
                <thead>
                  <th>No</th>
                  <th>Petugas</th>
                  <th>Tanggal Bayar</th>
                  <th>Bulan Bayar</th>
                  <th>Tahun Dibayar</th>
                  <th>SPP</th>
                  <th>Jumlah Bayar</th>
                </thead>
                <tbody>
                  <?php foreach($prosesData->tampilDataIdAll('pembayaran', 'nisn', $sesi['nisn']) as $no=>$data): ?>
                  <?php
                    $petugas = $prosesData->tampilDataId('petugas', 'id_petugas', $data['id_petugas']);
                    $spp = $prosesData->tampilDataId('spp', 'id_spp', $data['id_spp']);
                  ?>
                    <tr>
                      <td><?= $no+1 ?></td>
                      <td><?= $petugas['nama_petugas'] ?></td>
                      <td><?= $data['tgl_bayar'] ?></td>
                      <td><?= $data['bulan_bayar'] ?></td>
                      <td><?= $data['tahun_dibayar'] ?></td>
                      <td><?= $spp['tahun'].'- Rp.'.$spp['nominal'] ?></td>
                      <td><?= $data['jumlah_bayar'] ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>SPP Online</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="../assets/js/app.js"></script>

</body>

</html>