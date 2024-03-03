<?php
include "koneksi.php";
include "boot.php";
$tampil = $konek->query("SELECT * FROM pegawai");
?>

<div class="container mt-5 col-6 ">
    <form class="form form-control  " action="" method="POST" style="background-color:#FFE7B9;">
        <p class="text-center fs-2 fw-semibold mb-0">Input Pegawai</p>
        <div class="mb-2  ">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama"
                required placeholder="masukan nama">
        </div>
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat"
                required placeholder="Alamat">
        </div>
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tlp"
                required placeholder="no tlp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                required placeholder="e-mail">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lulusan"
                required placeholder="lulusan">
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
        </div>
</div>
</form>
</div>

<?php
$konek = new mysqli("localhost", "root", "", "projek_rpl1_syaa") or die("error");
if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    $email = $_POST['email'];
    $lulusan = $_POST['lulusan'];

    if (!empty($nama)) {
        $konek->query("insert into pegawai(nama,alamat,no_tlp,email,lulusan) values ('$nama','$alamat','$tlp','$email','$lulusan')");

        if ($nama) {
            echo '<div class="alert alert-success mt-3" role="alert">Data berhasil ditambahkan, silahkan cek list pegawai!</div>';
        } else {
            echo '<div class="</div>';
        }
    }
}

?>