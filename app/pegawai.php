<?php
include "koneksi.php";
include "boot.php";
$tampil = $konek->query("SELECT * FROM pegawai");
?>


<div class="text-center mt-5 ">
    <h1><b>  List Pegawai</b></h1>
</div>
<div class="text-end me-3">
    <a href="inputpegawai.php">
        <button type="button" class="btn mt-2 text-end" style="background-color:#8B6A43;">+Input Pegawai</button>
    </a>
</div>
<div class="container col-9 mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Tlpon</th>
                <th scope="col">E-mail</th>
                <th scope="col">Lulusan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <?php
        while ($s = $tampil->fetch_array()) {
            @$no++;
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$s[nama]</td>";
            echo "<td>$s[alamat]</td>";
            echo "<td>$s[no_tlp]</td>";
            echo "<td>$s[email]</td>";
            echo "<td>$s[lulusan]</td>";
            ?>
            <td>
                <button class='btn btn-danger'
                    onclick="if(confirm('Apakah anda yakin untuk menghapus data ini?')){document.location.href='delete2.php?id=<?= $s['no'] ?>'}"><i
                        class='bi bi-trash3'></i></button>

                <button class='btn btn-success mt-1' onclick="document.location.href='update2.php?id=<?= $s['no'] ?>'"><i
                        class="bi bi-pencil-square"></i></button>
            </td>
            <?php
            echo "</tr>";
        }
        ?>



    </table>
</div>