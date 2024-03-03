<?php
include "koneksi.php";
$id = $_GET['id'];
$ubah = $konek->query("select*from pegawai where no='$id'");
$a = $ubah->fetch_array();
?>

<?php
include "boot.php"
    ?>
<div class="container col-6 mt-5">
    <form class="form form-control " action="" method="POST" style="background-color:#FFE7B9;">
        <div class="mb-3">
            <p class="text-center fs-2 fw-semibold mb-0">Update Pegawai</p>
            <label for="exampleInputEmail1" class="form-label mt-3">nama</label>
            <input type="text" class="form-control" no="exampleInputEmail1" aria-describedby="emailHelp" name="nama"
                value="<?= $a['nama'] ?>">

            <label for="exampleInputEmail1" class="form-label mt-3">alamat</label>
            <input type="text" class="form-control" no="exampleInputEmail1" aria-describedby="emailHelp" name="alamat"
                value="<?= $a['alamat'] ?>">

            <label for="exampleInputEmail1" class="form-label mt-3">no telepon</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tlp"
                value="<?= $a['no_tlp'] ?>">

            <label for="exampleInputEmail1" class="form-label mt-3">email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                value="<?= $a['email'] ?>">

            <label for="exampleInputEmail1" class="form-label mt-3">lulusan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lulusan"
                value="<?= $a['lulusan'] ?>">


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
    $ganti = $konek->query("update pegawai set nama='$_POST[nama]',alamat='$_POST[alamat]',no_tlp='$_POST[tlp]',email='$_POST[email]',lulusan='$_POST[lulusan]'where no='$id'");
    echo '<div class="container col-5 mt-2 alert alert-success mt-3" role="alert">data berhasil di ubah <a href=pegawai.php>kembali</a> </div>';
}
?>