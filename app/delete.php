<?php
$id = $_GET['id'];
include "koneksi.php";
$delete = $konek->query("delete from gambar where no='$id'");

?>
<script>
    document.location = 'listmenu.php';
</script>