<?php
include "koneksi.php";
$id = $_GET['id'];
$ubah = $konek->query("select*from gambar where no='$id'");
$a = $ubah->fetch_array();
?>

<?php
include "boot.php"
    ?>
<div class="container col-6 mt-5">
    <form class="form form-control " action="" method="POST" style="background-color:#FFE7B9;">
        <div class="mb-3">
        <p class="text-center fs-2 fw-semibold mb-0">Update Menu</p>
            <label for="exampleInputEmail1" class="form-label mt-3">pesanan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama"
                value="<?= $a['nama'] ?>">

            <label for="exampleInputEmail1" class="form-label">harga</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga"
                value="<?= $a['harga'] ?>">

            <label for="exampleInputEmail1" class="form-label">gambar</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="gambar"
                value="<?= $a['gambar'] ?>">

            <div class="form-check">
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
                <button type="submit" class="btn btn-primary mt-3" name="ganti">Simpan</button>
            </div>
        </div>
    </form>
</div>
<?php
if (!isset($_POST['ganti'])) {
    echo '<div class="container col-3 mt-2 alert alert-warning mt-3 text-center"role="alert">silahkan ubah</div>';
} else {
    $edit = $konek->query("update gambar set nama='$_POST[nama]',gambar='$_POST[gambar]',harga='$_POST[harga]',status='$_POST[status]'where no='$id'");
    echo '<div class="container col-5 mt-2  alert alert-success mt-3" role="alert">data berhasil di ubah <a href=listmenu.php>kembali</a> </div>';
}
?>