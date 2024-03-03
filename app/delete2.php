<?php
$id=$_GET['id'];
include "koneksi.php";
$delete=$konek->query("delete from pegawai where no='$id'");
?>
<script>
    document.location = 'pegawai.php';
</script>