<?php
include "boot.php";
?>

<div class="container mt-5 col-6">
    <form enctype="multipart/form-data" class="form form-control " action="" method="POST"
        style="background-color:#FFE7B9;">
        <p class="text-center fs-2 fw-semibold mb-0">Input Menu</p>
        <div class="mb-3 mt-3 " style="background-color:#FFE7B9;">
            <label for="exampleInputEmail1" class="form-label">pesanan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama"
                required>

            <label for="exampleInputEmail1" class="form-label">harga</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga"
                required>

            <label for="exampleInputEmail1" class="form-label">gambar</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="gambar"
                required>

            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" checked
                    value="tersedia">
                <label class="form-check-label" for="tersedia">
                    tersedia
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="habis">
                <label class="form-check-label" for="tidak tersedia">
                    habis
                </label>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary mt-3" name="simpan">Simpan</button>
            </div>
        </div>
    </form>
</div>

<?php
$konek = new mysqli("localhost", "root", "", "projek_rpl1_syaa") or die("error");

if (isset($_POST['simpan'])) {

    $nama = $_FILES['gambar']['name'];
    $file = $_FILES['gambar']['tmp_name'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];


    move_uploaded_file($file, "../img/$nama");
    if (!empty($nama)) {
        $simpan = $konek->query("insert into gambar(nama,gambar,harga,status) values ('$_POST[nama]','$nama','$harga','$status')");

        if ($nama) {
            echo '<div class=" alert alert-success mt-3" role="alert">Menu berhasil ditambahkan, silahkan cek daftar menu!</div>';
        } else {
            echo '<div class="</div>';
        }
    }
}



?>