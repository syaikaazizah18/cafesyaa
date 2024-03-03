<?php
include "boot.php"
  ?>

<div class="container mt-5 col-6">
  <form class="form form-control   " action="" method="POST" style="background-color:#FFE7B9;">
    <p class="text-center fs-2 fw-semibold mb-0">Input Pembeli</p>
    <div class="mb-2 " style="background-color:#FFE7B9;">
      <label for="exampleInputEmail1" class="form-label"></label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" required
        placeholder="masukan nama">

      <div class="form-check">
        <input class="form-check-input" type="radio" name="meja" value="meja 1" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          meja 1
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="meja" value="meja 2" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          meja 2
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="meja" value="meja 3" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          meja 3
        </label>
      </div>
      <label for="exampleInputEmail1" class="form-label"></label>
      <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal"
        required placeholder="masukan tanggal">

    </div>

    <div class="d-grid gap-2 ">
      <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
    </div>
</div>
</form>
</div>

<?php
$konek = new mysqli("localhost", "root", "", "projek_rpl1_syaa") or die("error");

if (isset($_POST['simpan'])) {
  $tanggal = $_POST['tanggal'];
  $nama = $_POST['nama'];
  $nomeja = $_POST['meja'];

  if (!empty($nama)) {
    $simpan = $konek->query("insert into pembeli(tanggal,nama_pelanggan,no_meja) values ('$tanggal','$nama','$nomeja')");

    if ($nama) {
      echo '<div class="alert alert-success mt-3" role="alert">Data berhasil ditambahkan, silahkan cek list pembeli!</div>';
    } else {
      echo '<div class="</div>';
    }
  }
}
?>

</body>

</html>