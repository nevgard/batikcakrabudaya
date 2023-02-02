<?php
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:login.php");
}

include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Poppins:wght@400;600;700&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="assets/styles/font-awesome.min.css">

    <!-- MyStyle -->
    <link rel="stylesheet" href="assets/styles/style.css">

    <!-- Responsive Style -->
    <link rel="stylesheet" href="assets/styles/responsive.css">

    <!-- Logo Title -->
    <link rel="icon" href="../assets/img/ico_cakrabudaya.png" type="image/x-icon">
    <title>Admin</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap vh-100">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 position-fixed">
                    <div class="user bg-primary rounded p-1">
                        <a href="/" class="d-flex align-items-center mb-md-0 text-white text-decoration-none dropdown-toggle me-auto mx-1" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            <span class="d-none d-sm-inline mx-1"><?= $_SESSION['nama']; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                        </ul>
                        </a>
                    </div>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start mt-auto" id="menu">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="artikel.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-newspaper"></i> <span class="ms-1 d-none d-sm-inline">Artikel</span></a>
                        </li>
                        <li>
                            <a href="koleksi.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-collection"></i> <span class="ms-1 d-none d-sm-inline">Koleksi</span></a>
                        </li>
                        <li>
                            <a href="user.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Users</span></a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <!-- CONTENTT -->
            <div class="col my-auto">
                <div class="content text-center">
                    <h1>Selamat datang <?= $_SESSION['nama']; ?></h1>
                    <div class="row d-flex justify-content-center p-4">
                        <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 1");
                        while ($data = mysqli_fetch_array($tampil)) :
                        ?>
                            <div class="card me-4 p-4" style="width: 18rem;">
                                <img src="../assets/img/<?= $data['gambar']; ?>" class="card-img-top mt-2 mx-auto rounded" alt="..." style="width: 183px; height: 183px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['judul']; ?></h5>
                                    <p class="card-text text-truncate"><?= $data['deskripsi']; ?></p>
                                    <a href="artikel.php" class="btn btn-primary">Kelola Artikel</a>
                                </div>
                            </div>
                        <?php endwhile; ?>

                        <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM koleksi ORDER BY id_produk DESC LIMIT 1");
                        while ($data = mysqli_fetch_array($tampil)) :
                        ?>
                            <div class="card p-4" style="width: 18rem;">
                                <img src="../assets/img/<?= $data['gambar']; ?>" class="card-img-top mt-2" alt="..." style="height: 183px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['nama']; ?></h5>
                                    <p class="card-text text-truncate"><?= $data['deskripsi']; ?></p>
                                    <a href="koleksi.php" class="btn btn-primary">Kelola Koleksi</a>
                                </div>
                            </div>
                        <?php endwhile; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->