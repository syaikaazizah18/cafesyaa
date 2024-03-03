<?php
include "koneksi.php";
include "boot.php";
$cari2 = $_POST['nama'];
$no = 1;
$tampil = $konek->query("SELECT * FROM pembeli where nama_pelanggan='$cari2' ");
while ($cari = $tampil->fetch_array()) {

  ?>

  <div class="text-center mt-5">
    <nav class="navbar bg-body-tertiary mx-2">
      <div class="container-fluid">
        <a class="navbar-brand">
          <h1>List Pembeli</h1>
        </a>
        <form class="d-flex" role="search" action="search2.php" method="POST" target="konten">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nama">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </div>


  <div class="container col-8 mt-3">
    <table class="table table-bordered ">
      <thead>
        <tr>
          <th scope="col">Id Pelanggan</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Nama Pelanggan</th>
          <th scope="col">No Meja</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tr>
        <th scope="col">
          <?= $no++ ?>
        </th>
        <th scope="col">
          <?= $cari['tanggal'] ?>
        </th>
        <th scope="col">
          <?= $cari['nama_pelanggan'] ?>
        </th>
        <th scope="col">
          <?= $cari['no_meja'] ?>
        </th>

        <td>
          <a href="bayar.php?no=<?= $cari['no'] ?>&nama=<?= $cari['nama_pelanggan'] ?>">

            <button class='btn btn-danger'>bayar</i></button>
          </a>
      </tr>
      </tr>

      <?php
}
?>