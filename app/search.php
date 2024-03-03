<?php
include "koneksi.php";
include "boot.php";
$cari2 = $_POST['search'];
$tampil = $konek->query("SELECT * FROM gambar where nama='$cari2' ");
while ($cari = $tampil->fetch_array()) {

  ?>

  <div class="text-center mt-5">
    <nav class="navbar bg-body-tertiary ">
      <div class="container-fluid">
        <a class="navbar-brand">
          <h1>Daftar Menu</h1>
        </a>
        <form class="d-flex" role="search" action="search.php" method="POST" target="konten">
          <input class="form-control me-2" type="search" placeholder="cari" aria-label="Search" name="search">
          <button class="btn btn-outline-success" type="submit">cari</button>
        </form>
      </div>
    </nav>
  </div>

  <div class="col col-3 mt-4 ms-4 ">
    <div class="card" style="width: 13rem;">
      <img src="../img/<?= $cari['gambar'] ?>" class="card-img-top" alt="..." height="150">
      <div class="card-body">
        <h5 class="card-title">
          <?= $cari['nama'] ?>
        </h5>
        <h5>
          <p class="card-text">Rp.
            <?= $cari['harga'] ?>
          </p>
        </h5>
        <h5><i>
            <p class="card-text link-success">
              <?= $cari['status'] ?>
            </p>
          </i></h5>
      </div>
    </div>
  </div>

  <?php

}
?>

<?php if (isset($_GET['cari'])): ?>
  <?php $cari = $_GET['cari'] ?>
  <?php $query = mysqli_query($konek, "select * FROM gambar where no like'%" . $cari . "%'"); ?>
<?php else: ?>
  <?php $query = mysqli_query($konek, "SELECT * FROM gambar"); ?>
<?php endif
?>