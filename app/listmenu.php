<?php
include "koneksi.php";
include "boot.php";
$tampil = $konek->query("SELECT * FROM gambar");
?>
<div class="text-center mt-5 ">
    <a class="navbar-brand">
        <h1> <b>List Menu</b></h1>
    </a>
</div>

<div class="container col-8 mt-3">
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <?php
        while ($s = $tampil->fetch_array()) {
            @$no++;
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$s[nama]</td>";
            echo "<td>$s[harga]</td>";
            echo "<td>$s[status]</td>";
            ?>
            <td>
                <button class='btn btn-danger'
                    onclick="if(confirm('Apakah anda yakin untuk menghapus data ini?')){document.location.href='delete.php?id=<?= $s['no'] ?>'}"><i
                        class='bi bi-trash3'></i></button>

                <button class='btn btn-success' onclick="document.location.href='update.php?id=<?= $s['no'] ?>'"><i
                        class="bi bi-pencil-square"></i></button>
            </td>
            <?php
            echo "</tr>";
        }
        ?>



        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>