<?php
session_start();
$user = $_SESSION['user'];
if (!isset($user)) {
    ?>
    <script>
        document.location.href = 'login.php';
    </script>
    <?php
} else {
    include "boot.php"
        ?>



    <?php

    include "boot.php";
    ?>

    <body background="../img/zzz.png" style="background-size:cover;">
        <div class="container">

            <!-- pembuka navbar -->
            <nav class="navbar navbar-expand-lg mt-2">
                <div class="container-fluid " style="background-color:#8B6A43;">
                    <img src="../img/kir.png" alt="" width="70">
                    <a class="navbar-brand fw-bold text-light" href="">
                        <h2>CaffeCIK</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="navbarSupportedContent">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false"><i class="bi bi-person-circle"></i></button>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><button class="dropdown-item" type="button">
                                        <?= $user ?>
                                    </button></li>
                            </ul>
                        </div>
                        <a href="login.php" onclick="return confirm('Apakah anda yakin untuk keluar?');">
                            <button type="button" class="btn btn-outline-danger"><i
                                    class="bi bi-box-arrow-right"></i></button>
                        </a>
                        </form>
                    </div>

            </nav>
            <!-- <form class="d-flex" role="search" action="search.php" method="post" target="konten" > -->

            <!-- halaman -->
            <div class="row ">
                <div class="col col-3 mt-2 ">
                    <ul class="list-group">
                        <li class="list-group-item fw-bold text-dark" style="background-color:#8B6A43;" aria-current="true">
                            Beranda</li>
                        <a href="menu.php" target="konten">
                            <li class="list-group-item"><b> Daftar Menu</b></li>
                        </a>
                        <a href="input.php" target="konten">
                            <li class="list-group-item"><b>Input menu</b></li>
                        </a>
                        <a href="listmenu.php" target="konten">
                            <li class="list-group-item"><b>List Menu</b></li>
                        </a>
                        <a href="inputpembeli.php" target="konten">
                            <li class="list-group-item"><b>Input Pembeli</b></li>
                        </a>
                        <a href="listpembeli.php" target="konten">
                            <li class="list-group-item"><b>List Pembeli</b></li>
                        </a>
                        <a href="pegawai.php" target="konten">
                            <li class="list-group-item"><b>List Pegawai</b></li>
                        </a>
                        <a href="rekap.php" target="konten">
                            <li class="list-group-item"><b>Rekap</b></li>
                        </a>


                    </ul>
                </div>



                <div class="col col-9 mt-3">
                    <iframe src="" name="konten" frameborder="0" width="100%" height="800"></iframe>
                </div>

                <!-- penutup halaman -->
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    </body>

    </html>
    </body>

    <?php
}
?>