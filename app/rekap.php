<?php
include "boot.php"; // Memasukkan file boot.php yang berisi koneksi ke database
include "koneksi.php";

// Rekap per hari
if (isset($_POST['filter_hari'])) {
    $tanggal = $_POST['tanggal'];
    $query_per_hari = "SELECT * FROM kasir k, pembeli p WHERE k.pelanggan_id=p.no AND DATE(p.tanggal) = '$tanggal'";
    $result_per_hari = mysqli_query($konek, $query_per_hari);
}

// Rekap per bulan
if (isset($_POST['filter_bulan'])) {
    $bulan_tahun = $_POST['bulan_tahun'];
    // Mengubah format bulan dan tahun menjadi format yang sesuai dengan database (YYYY-MM)
    $bulan_tahun_db = date('Y-m', strtotime($bulan_tahun));
    $query_per_bulan = "SELECT * FROM kasir k, pembeli p WHERE k.pelanggan_id=p.no AND DATE_FORMAT(p.tanggal, '%Y-%m') = '$bulan_tahun_db'";
    $result_per_bulan = mysqli_query($konek, $query_per_bulan);
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center col-8 mt-3">
        <h1><b> Rekap Transaksi</b></h1>

        <!-- Form filter per hari -->
        <div class="mb-2 mt-3">
            <form action="" method="post">
                <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                <button type="submit" name="filter_hari" class="btn btn-outline-success mt-2">Rekap Per Hari</button>
            </form>
        </div>

        <!-- Form filter per bulan -->
        <div class="mb-2 mt-3">
            <form action="" method="post">
                <label for="bulan_tahun" class="form-label">Pilih Bulan dan Tahun:</label>
                <input type="month" class="form-control" id="bulan_tahun" name="bulan_tahun" required>
                <button type="submit" name="filter_bulan" class="btn btn-outline-success mt-2">Rekap Per Bulan</button>
            </form>
        </div>

        <!-- Tabel rekap per hari -->
        <?php if (isset($result_per_hari)): ?>
            <div class="container mt-3">
                <h2>Rekap Transaksi Per Hari </h2>
                <?= $tanggal ?>
                <table class="table table-bordered mt-1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result_per_hari)) {
                            ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $row['tanggal']; ?>
                                </td>
                                <td>
                                    <?= $row['nama_pelanggan']; ?>
                                </td>
                                <td>
                                    <?= $row['menu']; ?>
                                </td>
                                <td>
                                    <?= $row['harga']; ?>
                                </td>
                                <td>
                                    <?= $row['jumlah']; ?>
                                </td>
                                <td>
                                    <?= $row['total']; ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <!-- Tabel rekap per bulan -->
        <?php if (isset($result_per_bulan)): ?>
            <div class="container mt-3">
                <h2>Rekap Transaksi Per Bulan </h2>
                <?= date('F Y', strtotime($bulan_tahun)) ?>
                <table class="table table-bordered mt-3 text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result_per_bulan)) {
                            ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $row['tanggal']; ?>
                                </td>
                                <td>
                                    <?= $row['nama_pelanggan']; ?>
                                </td>
                                <td>
                                    <?= $row['menu']; ?>
                                </td>
                                <td>
                                    <?= $row['harga']; ?>
                                </td>
                                <td>
                                    <?= $row['jumlah']; ?>
                                </td>
                                <td>
                                    <?= $row['total']; ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>