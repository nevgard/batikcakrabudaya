<?php

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
  <link rel="stylesheet" href="assets/styles/font-awesome.min.css">
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- MyStyle -->
  <link rel="stylesheet" href="assets/styles/style.css">

  <!-- Logo Title -->
  <link rel="icon" href="assets/img/ico_cakrabudaya.png" type="image/x-icon">
  <title>Batik Cakra Budaya</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark w-100 subnavbar">
    <div class="container" data-aos="fade-down" data-aos-duration="750">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.png" height="80px" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">HOME</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="koleksi.php">KOLEKSI</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link active" aria-current="page" href="#">ARTIKEL</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="tentangkami.php">ABOUT US</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="atas">
    <div class="container h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-offset="300">
      <div class="row h-100 text-center p-4 d-flex align-items-center">
        <h3 class="fw-bold">Artikel</h3>
      </div>
    </div>
  </section>

  <section id="artikel">
    <div class="container">
      <div class="row h-100 my-5">

        <?php

        //tampil data artikel
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id_artikel DESC");
        while ($data = mysqli_fetch_array($tampil)) :
        ?>
          <div class="col-md-3 my-3" data-aos="flip-left" data-aos-duration="750" data-aos-delay="100" data-aos-offset="300">
            <div class="card" style="height: 28rem;">
              <img src="assets/img/<?= $data['gambar']; ?>" class="card-img-top img-fluid" style="height: 200px; object-fit:cover;" alt="...">
              <div class="card-body d-flex align-items-start flex-column">
                <h5 class="card-title mb-auto"><?= $data['judul']; ?></h5>
                <p class="card-text"><?= $data['deskripsi']; ?></p>
                <span><?= $data['date']; ?></span>
                <a data-bs-toggle="modal" data-bs-target="#modalArtikel<?= $data['id_artikel']; ?>" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!-- Modal artikel-->
          <div class="modal fade" id="modalArtikel<?= $data['id_artikel']; ?>" tabindex="-1" aria-labelledby="modalKemeja" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <img src="assets/img/logo.png" alt="" class="img-fluid" style="height: 70px;">
                </div>
                <div class="modal-body py-5">
                  <div class="row">
                    <div class="col-md-6 mx-auto">
                      <img src="assets/img/<?= $data['gambar']; ?>" class="img-fluid rounded" alt="">
                    </div>
                  </div>
                  <div class="row py-5">
                    <div class="col-12 text-start">
                      <h1><?= $data['judul']; ?></h1>
                      <span><?= nl2br($data['deskripsi']); ?></span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="text-center text-lg-start" data-aos="fade-up" data-aos-delay="100">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="bi bi-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="bi bi-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="bi bi-instagram"></i>
        </a>

        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <img src="assets/img/logo.png" class="img-fluid">
            </h6>
            <p>
              kami terus belajar dan selalu memperhatikan segi kualitas yang baik serta memiliki “ciri khas” tersendiri sehingga konsumen merasa puas dengan produksi batik yang kami hasilkan.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 mx-auto mb-4 text-center embed-responsive embed-responsive-1by1">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4 ">
              location
            </h6>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.993996122587!2d109.6713641144996!3d-6.891320469350238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70242e76acafb3%3A0x62b11f3f96cee58b!2sKauman%20Gg.%2012%20No.9%2C%20Kauman%2C%20Kec.%20Pekalongan%20Tim.%2C%20Kota%20Pekalongan%2C%20Jawa%20Tengah%2051127!5e0!3m2!1sid!2sid!4v1674177232190!5m2!1sid!2sid" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded"></iframe>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4 ">
              Useful links
            </h6>
            <p>
              <a href="tentangkami.php" class="text-reset">About Us</a>
            </p>
            <p>
              <a href="koleksi.php" class="text-reset">Koleksi</a>
            </p>
            <p>
              <a href="index.php#layanan" class="text-reset">Layanan</a>
            </p>
            <p>
              <a href="artikel.php" class="text-reset">Artikel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p class="fw-light"><i class="bi bi-envelope me-3"></i> <small> Wahid Hasyim, Kauman XII No.9, Pekalongan</small></p>
            <p><i class="bi bi-phone me-3"></i><small> 0817-6489-900</small></p>
            <p><i class="bi bi-geo-alt me-3"></i><small>email.cakrabudaya@gmail.com</small></p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2022 Copyright:
      <a class="text-reset fw-bold" href="https://www.instagram.com/fahmifaza_/">Ahmad fahmi faza</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  <!-- BOOTSRAPP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- my js -->
  <script src="/assets/js/script.js"></script>
</body>

</html>