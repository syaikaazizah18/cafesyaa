<button class="btn" onclick="printDiv('div1')"><i class="bi bi-printer-fill fs-1"></i></button>
<div id="div1">
    <!-- yang di print -->
    <?php
    include "koneksi.php";
    include "boot.php";
    $tampil = $konek->query("SELECT * FROM pembeli");
    ?>



    <div class="container col-8 mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th> <!-- Tambahkan kolom nomor urutan -->
                    <th scope="col">tanggal</th>
                    <th scope="col">pelanggan</th>
                    <th scope="col">meja</th>
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
                        echo "<td>$s[nama_pelanggan]</td>";
                        echo "<td>$s[no_meja]</td>";
                        echo "<td>$s[total_bayar]</td>";
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
    <!-- tutup halaman yang di print -->
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