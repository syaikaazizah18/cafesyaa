<?php
include "boot.php";
include "koneksi.php";

$tampil = $konek->query("select* from gambar");

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

<div class="row">
  <?php
  while ($a = $tampil->fetch_array()) {

    ?>

    <div class="col col-3 mt-3 ms-4">
      <div class="card" style="width: 13rem;">
        <img src="../img/<?= $a['gambar'] ?>" class="card-img-top" alt="..." height="150">
        <div class="card-body">
          <h5 class="card-title">
            <?= $a['nama'] ?>
          </h5>
          <h5>
            <p class="card-text">Rp.
              <?= $a['harga'] ?>
            </p>
          </h5>
          <h5><i>
              <p class="card-text link-success">
                <?= $a['status'] ?>
              </p>
            </i></h5>
        </div>
      </div>

    </div>
    <?php
  }
  ?>
</div>