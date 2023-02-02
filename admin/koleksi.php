<?php
session_start();

//panggil koneksi database
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
  <link rel="stylesheet" href="../assets/styles/font-awesome.min.css">

  <!-- MyStyle -->

  <!-- Responsive Style -->
  <link rel="stylesheet" href="../assets/styles/responsive.css">

  <!-- Logo Title -->
  <link rel="icon" href="../assets/img/ico_cakrabudaya.png" type="image/x-icon">
  <title>Admin</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 position-fixed">
          <div class="user bg-primary rounded p-1">
            <a href="/" class="d-flex align-items-center mb-md-0 text-white text-decoration-none dropdown-toggle me-auto mx-1" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi-person-circle"></i>
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
              <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-collection"></i> <span class="ms-1 d-none d-sm-inline">Koleksi</span></a>
            </li>
            <li>
              <a href="user.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Users</span></a>
            </li>
          </ul>
          </li>
          </ul>
          <hr>
        </div>
      </div>
      <!-- CONTENTT -->
      <div class="col py-3">
        <div class="content p-5">
          <h1 class="text-dark">Koleksi</h1>
          <div class="card">
            <div class="card-header bg-primary text-white">
              Data Koleksi
            </div>
            <div class="card-body">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
                Tambah Koleksi
              </button>
              <table class="table table-hover table-fixed">
                <thead>
                  <tr>
                    <th style="width: 5%">ID.</th>
                    <th style="width: 20%">Nama</th>
                    <th style="width: 10%">Kategori</th>
                    <th style="width: 20%">Deskripsi</th>
                    <th style="width: 10%">Gambar</th>
                    <th style="width: 10%">Date</th>
                    <th style="width: 15%">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  //persiapan menampilkan data
                  $no = 1;
                  $tampil = mysqli_query($koneksi, "SELECT * FROM koleksi ORDER BY id_produk DESC");
                  while ($data = mysqli_fetch_array($tampil)) :
                  ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['kategori'] ?></td>
                      <td><?= $data['deskripsi'] ?></td>
                      <td><img src="../assets/img/<?= $data['gambar']; ?>" alt="" class="img-fluid"></td>
                      <td><?= $data['date']; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">edit</button>
                        <button type=" button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">delete</button>
                      </td>
                    </tr>
                    <!-- Modal ubah -->
                    <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Koleksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="aksi_koleksi.php" enctype="multipart/form-data">
                            <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                            <div class="modal-body">

                              <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama" name="tnama" value="<?= $data['nama'] ?>">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="tkategori">
                                  <option selected><?= $data['kategori'] ?></option>
                                  <option value="Kain">Kain</option>
                                  <option value="Kemeja">Kemeja</option>
                                  <option value="Dress">Dress</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdeskripsi"><?= $data['deskripsi'] ?></textarea>
                              </div>
                              <div class="mb-3">
                                <label for="formFileSm" class="form-label">Gambar</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" name="tgambar" value=>
                              </div>

                            </div>
                            <div class=" modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success" name="bubah">Ubah</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- akhir modal ubah -->

                    <!-- Modal hapus -->
                    <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Hapus Data Koleksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="aksi_koleksi.php">
                            <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                            <div class="modal-body">
                              <h5 class="text-center">Apakah Anda Yakin ingin menghapus data ini?</h5>
                              <h5 class="text-center"><?= $data['id_produk']; ?> - <?= $data['nama']; ?></h5>
                            </div>
                            <div class=" modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success" name="bhapus">hapus</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- akhir modal hapus -->


                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>


          <!-- Modal Tambah -->
          <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Koleksi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="aksi_koleksi.php" enctype="multipart/form-data">
                  <div class="modal-body">

                    <div class="mb-3">
                      <label class="form-label">nama</label>
                      <input type="text" class="form-control" placeholder="Masukan Nama" name="tnama">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kategori</label>
                      <select class="form-select" aria-label="Default select example" name="tkategori">
                        <option selected>-</option>
                        <option value="Kain">Kain</option>
                        <option value="Kemeja">Kemeja</option>
                        <option value="Dress">Dress</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdeskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="formFileSm" class="form-label">Gambar</label>
                      <input class="form-control form-control-sm" id="formFileSm" type="file" name="tgambar">
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="bsimpan">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- akhir modal -->
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