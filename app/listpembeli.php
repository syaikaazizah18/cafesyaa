<?php
include "koneksi.php";
include "boot.php";
$tampil = $konek->query("SELECT * FROM pembeli");
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
      <?php
      while ($s = $tampil->fetch_array()) {
        @$no++;
        echo "<td>$no</td>";
        echo "<td>$s[tanggal]</td>";
        echo "<td>$s[nama_pelanggan]</td>";
        echo "<td>$s[no_meja]</td>";
        ?>
        <td>
          <a href="bayar.php?no=<?= $s['no'] ?>&nama=<?= $s['nama_pelanggan'] ?>">

            <button class='btn btn-danger'>bayar</i></button>
          </a>
        </td>
      </tr>
      <?php

      }
      ?>



  </table>