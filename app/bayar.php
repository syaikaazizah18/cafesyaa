<?php
include "koneksi.php";
include "boot.php";
$id = $_GET['no'];
$ubah = $konek->query("SELECT * FROM pembeli WHERE no='$id'");
$a = $ubah->fetch_array();

?>

<div class="text-center mt-5 ">
    <h1>Transaksi Pembayaran</h1>
</div>

<div class="container mt-5 col-5">
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Menu</label>
            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon"
                name="id_menu">
                <?php $menu = $konek->query("SELECT * FROM gambar"); ?>
                <?php while ($m = $menu->fetch_array()): ?>
                    <option value="<?= $m['no'] ?>">
                        <?= $m['nama'] ?>
                    </option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="exampleFormControlInput1">Jumlah</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="jumlah">
        </div>
        <div class="form-group ">
            <button class="btn btn-outline-success" type="submit" name="pilih">Pilih</button>
        </div>
    </form>
</div>





<?php
if (isset($_POST['pilih'])) {
    $id_menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];
    $querymenu = $konek->query("SELECT * FROM gambar WHERE no='$id_menu'");
    $menu = $querymenu->fetch_array();

    $nama_menu = $menu['nama'];
    $harga = $menu['harga'];
    $total = $jumlah * $harga;


    $konek->query("INSERT INTO kasir (pelanggan_id, menu, harga, jumlah, total) VALUES ('$id', '$nama_menu', '$harga', '$jumlah', '$total')");
}
?>

<!-- <div class="container mt-5 col-5">
    <form class="row g-3" action="" method="POST">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Tanggal</label>
            <input class="form-control" id="inputEmail4" value="<?php echo $a['tanggal'] ?>" name="tanggal">
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Nama Menu</label>
            <input type="varchar" class="form-control" id="inputPassword4" value="<?php echo $a['nama_menu'] ?>" name="nama_menu">
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="inputEmail4" value="<?php echo $a['nama_pelanggan'] ?>" name="nama_pelanggan">
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Harga</label>
            <input type="number" class="form-control" id="inputPassword4" value="<?php echo $a['harga'] ?>" name="harga">
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">No Meja</label>
            <input type="text" class="form-control" id="inputEmail4" value="<?php echo $a['no_meja'] ?>" name="no_meja">
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="inputPassword4" name="jumlah">
        </div>

        <div class="col-12">

            <button type="submit" class="btn btn-success" name="bayar">Bayar</button>
        </div>
    </form>
</div> -->

<?php
if (isset($_POST['bayar'])) {

    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nama_menu = $_POST['nama_menu'];

    $harga = $_POST['harga'];
    $no_meja = $_POST['no_meja'];
    $jumlah = $_POST['jumlah'];


    $konek->query("insert into pembeli(tanggal,nama_pelanggan,nama_menu,harga,no_meja,jumlah) values ('$tanggal','$nama_pelanggan','$nama_menu','$harga','$no_meja','$jumlah')");
}
$tampil = $konek->query("SELECT * FROM kasir INNER JOIN pembeli ON kasir.pelanggan_id = pembeli.no WHERE kasir.pelanggan_id='$id'");
?>
<div class="mb-4 text-end me-5">
    <button class="btn btn-outline-dark" onclick="printDiv('print')"><i class="bi bi-printer-fill fs-3"></i></button>
    <div id="print">



        <div class="container col-8 mt-3">
            <tr>
                <td colspan="4">Total Bayar</td>
                <td>
                    <?php
                    $x = mysqli_query($konek, "SELECT SUM(total) AS total2 FROM kasir where pelanggan_id='$id'");
                    $xx = mysqli_fetch_array($x);
                    echo "<b> Rp." . number_format($xx['total2']) . ",-</b>";
                    ?>
                </td>
            </tr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th> <!-- Tambahkan kolom nomor urutan -->
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    if ($tampil !== null) {
                        while ($s = $tampil->fetch_array()) {
                            $no++;
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>$s[tanggal]</td>";
                            echo "<td>$s[menu]</td>";
                            echo "<td>$s[harga]</td>";
                            echo "<td>$s[jumlah]</td>";
                            echo "<td>$s[total]</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Handle jika $tampil bernilai null
                        echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>
    <script>
        function printDiv(el) {
            var a = document.body.innerHTML;
            var b = document.getElementById(el).innerHTML;
            document.body.innerHTML = b;
            window.print();
            document.body.innerHTML = a;
        }
    </script>