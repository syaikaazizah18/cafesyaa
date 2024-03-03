<?php
include "boot.php"
?>
<div class="container col-8 mt-3">
    <table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Pesanan</th>
        <th scope="col">Meja</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>

<?php
    while ($s = $tampil->fetch_array()){
        @$no++;
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>$s[Pesanan]</td>";
        echo "<td>$s[Meja]</td>";
        echo "<td>$s[NamaPelanggan]</td>";
        ?>

    <?php
    }
    ?>