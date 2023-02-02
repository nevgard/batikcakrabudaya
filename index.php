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
  <!-- Responsive Style -->
  <link rel="stylesheet" href="assets/styles/responsive.css">

  <!-- Logo Title -->
  <link rel="icon" href="assets/img/ico_cakrabudaya.png" type="image/x-icon">
  <title>Batik Cakra Budaya</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100">
    <div class="container" data-aos="fade-down" data-aos-duration="750">
      <a class="navbar-brand" href="#">
        <img src="assets/img/logo.png" height="80px" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">HOME</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="koleksi.php">KOLEKSI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikel.php">ARTIKEL</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="tentangkami.php">ABOUT US</a>
          </li>
          <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle text-muted" href="/" class="dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              Admin?
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="admin/login.php">Login</a></li>
            </ul>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="hero">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-md-12 hero-tagline my-auto" data-aos="fade-up" data-aos-duration="750">
          <h1>Karya Orisinil Batik Tulis Pekalongan</h1>
          <p><span class="fw-bold">Cakra Budaya</span> adalah perusahaan home industry yang bergerak pada bidang proses pembuatan batiktulis dan cap yang berdiri sejak tahun 1975 oleh Ibu Nadjmawati Hakim.</p>

          <button class="button-lg-primary" onclick="location.href='koleksi.php';">Explore Product</button>
        </div>
      </div>


    </div>
  </section>

  <!-- Plus Section -->
  <section id="plus">
    <div class="container h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
      <div class="row h-100">
        <div class="col-md-6">
          <img src="assets/img/motif.png" alt="">
          <img src="assets/img/corak.png" alt="">
        </div>
        <div class="col-md-6">
          <h2>Motif dan Corak yang Beragam</h2>
          <p>Batik yang kini telah didesain lebih modern oleh kreativitas para pengrajin tanpa menghilangkan sisi artistik. Maka dengan itu Batik Cakra Budaya menciptakan berbagai motif yang dapat digunakan oleh berbagai kalangan usia.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Koleksi Section  -->
  <section id="koleksi">
    <div class="container h-100">
      <div class="row h-100 text-center">
        <div class="col-md-12 my-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-offset="300">
          <h2 class="display-4 fw-bold">Koleksi Kami</h2>
        </div>
      </div>
      <div class="row h-100 text-center koleksi">
        <!-- kemeja -->
        <?php

        //tampil data koleksi KEMEJA
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM koleksi  WHERE kategori = 'kemeja' ORDER BY id_produk DESC LIMIT 2");
        while ($data = mysqli_fetch_array($tampil)) :
        ?>
          <div class="col-md-3" data-aos="flip-left" data-aos-duration="750" data-aos-delay="100" data-aos-offset="300">
            <a href="#hero" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalKemeja<?= $data['id_produk']; ?>">
              <div class="card-koleksi" style=" height: 432px;">
                <img src="assets/img/<?= $data['gambar']; ?>" alt="">
                <div class="intro mt-4">
                  <h3><?= $data['nama']; ?></h3>
                </div>
              </div>
            </a>
          </div>

          <!-- Modal Kemeja-->
          <div class="modal fade" id="modalKemeja<?= $data['id_produk']; ?>" tabindex="-1" aria-labelledby="modalKemeja" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <img src="assets/img/logo.png" alt="" class="img-fluid" style="height: 70px;">
                </div>
                <div class="modal-body py-5">
                  <div class="row">
                    <div class="col-6">
                      <img src="assets/img/<?= $data['gambar']; ?>" class="img-fluid img-lg" alt="">
                    </div>
                    <div class="col-6 text-start">
                      <h1><?= $data['nama']; ?></h1>
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
        <!-- dress -->
        <?php

        //tampil data koleksi dress
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM koleksi  WHERE kategori = 'dress' ORDER BY id_produk DESC LIMIT 1");
        while ($data = mysqli_fetch_array($tampil)) :
        ?>
          <div class="col-md-3" data-aos="flip-left" data-aos-duration="750" data-aos-delay="150" data-aos-offset="300">
            <a href="#hero" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalDress<?= $data['id_produk']; ?>">
              <div class="card-koleksi" style=" height: 432px;">
                <img src="assets/img/<?= $data['gambar']; ?>" alt="">
                <div class="intro mt-4">
                  <h3><?= $data['nama']; ?></h3>
                </div>
              </div>
            </a>
          </div>

          <!-- Modal Dress-->
          <div class="modal fade" id="modalDress<?= $data['id_produk']; ?>" tabindex="-1" aria-labelledby="modalKemeja" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <img src="assets/img/logo.png" alt="" class="img-fluid" style="height: 70px;">
                </div>
                <div class="modal-body py-5">
                  <div class="row">
                    <div class="col-6">
                      <img src="assets/img/<?= $data['gambar']; ?>" class="img-fluid img-lg" alt="">
                    </div>
                    <div class="col-6 text-start">
                      <h1><?= $data['nama']; ?></h1>
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
        <!-- kain -->
        <?php

        //tampil data koleksi kain
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM koleksi  WHERE kategori = 'kain' ORDER BY id_produk DESC LIMIT 1");
        while ($data = mysqli_fetch_array($tampil)) :
        ?>
          <div class="col-md-3" data-aos="flip-left" data-aos-duration="750" data-aos-delay="200" data-aos-offset="300">
            <a href="#hero" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalKain<?= $data['id_produk']; ?>">
              <div class="card-koleksi" style=" height: 432px;">
                <img src="assets/img/<?= $data['gambar']; ?>" alt="">
                <div class="intro mt-4">
                  <h3><?= $data['nama']; ?></h3>
                </div>
              </div>
            </a>
          </div>

          <!-- Modal Kain-->
          <div class="modal fade" id="modalKain<?= $data['id_produk']; ?>" tabindex="-1" aria-labelledby="modalKemeja" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <img src="assets/img/logo.png" alt="" class="img-fluid" style="height: 70px;">
                </div>
                <div class="modal-body py-5">
                  <div class="row">
                    <div class="col-6">
                      <img src="assets/img/<?= $data['gambar']; ?>" class="img-fluid img-lg" alt="">
                    </div>
                    <div class="col-6 text-start">
                      <h1><?= $data['nama']; ?></h1>
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
      <div class="row h-100 text-center">
        <div class="col-md-12 my-5" data-aos="zoom-in-up" data-aos-delay="250">
          <button class="button-lg-primary" onclick="location.href='koleksi.php';">Selengkapnya</button>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-md-6" data-aos="fade-right" data-aos-duration="750" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <h3 class="fw-bold">About Us</h3>
          <p>Batik “Cakra Budaya” adalah perusahaan home industry yang bergerak pada bidang proses pembuatan batiktulis dan cap yang berdiri sejak tahun 1975 oleh Ibu Nadjmawati Hakim. Berbekal dari pengalaman dan usaha yang telah ditekuni secara turun temurun, kami terus belajar dan selalu memperhatikan segi kualitas yang baik serta memiliki “ciri khas” tersendiri sehingga konsumen merasa puas dengan produksi batik yang kami hasilkan.</p>
          <button class="btn button-lg-secondary" onclick="location.href='tentangkami.php';">About Us</button>
        </div>
        <div class="col-md-6" data-aos="fade-left" data-aos-duration="750" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <div class="ratio ratio-16x9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-Lq7MBVxZR0" frameborder="0" style="border-radius: 20px;">
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Animasi Section -->
  <section id="animasi">
    <div class="container h-100">
      <div class="row h-100 text-center">
        <div class="col-md-12" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-offset="300">
          <h2 class="fw-bold">Proses Pembuatan Batik</h2>
        </div>
      </div>
      <div class="row h-100 mt-5">
        <div class="col-md-6" data-aos="fade-right" data-aos-duration="750" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <div class="ratio ratio-16x9">
            <iframe class="embed-responsive-item" src="assets/ANIMASI PROSES MEMBATIK (1).mp4" style="border-radius: 20px;" autostart="0"></iframe>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-left" data-aos-duration="750" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <p>Dalam membuat batik tulis Indonesia, ada beberapa tahapan-tahapan yang perlu diketahui. Setiap sehelai kain batik tulis yang dihasilkan tidak hanya dihasilkan oleh seorang perempuan yang duduk mencanting saja. Biasanya, terdapat jasa empat hingga lima orang dalam mengerjakannya, yang kebanyakan bukan dikerjakan di pabrik, melainkan industri rumahan yang memainkan peran utama dalam mengerjakan proses membatik ini. Untuk lebih detailnya bisa tonton video di sebelah</p>
        </div>
      </div>
    </div>
  </section>

  <!-- motto section -->
  <section id="motto">
    <div class="container h-100 text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="150">
      <div class="row h-100">
        <div class="col-12">
          <h2>Kami terus belajar dan selalu memperhatikan segi kualitas yang baik serta memiliki “ciri khas” tersendiri sehingga konsumen merasa puas dengan produksi batik yang kami hasilkan.</h2>
        </div>
      </div>
    </div>
  </section>

  <section id="layanan">
    <div class="container text-center mb-5">
      <div class="row">
        <div class="col" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-offset="250">
          <h2 class="fw-bold">Layanan Kami</h2>
        </div>
      </div>
      <div class="row mt-5 ">
        <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="100">
          <div>
            <img class="img-fluid" src="assets/img/produksikain.png" alt="">
          </div>
          <div class="mt-5">
            <h4>Produksi Bahan dan Motif Batik</h4>
            <span>Kami membuat bahan kain dan motif batik sesuai dengan pasar kelas menengah atas dengan kualitas premium.</span>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="200">
          <div>
            <img class="img-fluid" src="assets/img/kemeja (8).jpg" alt="">
          </div>
          <div class="mt-5">
            <h4>Produksi Baju</h4>
            <span>Kami membuat design baju yang dikombinasikan dengan kualitas bahan, jahitan dan benangan yang menhasilkan produk yang nyaman dipakai.</span>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="300">
          <div>
            <img class="img-fluid" src="assets/img/IMG_2024.jpg" alt="">
          </div>
          <div class="mt-5">
            <h4>Penjualan</h4>
            <span>Saat ini kami bekerjasama dengan beberapa Departement Store di Jakarta dan Surabaya. Adapun penjualan juga melalui Direct Sales.</span>
          </div>
        </div>
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
              <a href="#layanan" class="text-reset">Layanan</a>
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
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- MY JS -->
  <script src="assets/js/script.js"></script>
</body>

</html>