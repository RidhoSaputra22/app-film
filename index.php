<?php
include 'conf/info.php';
include 'api/api_movie.php';
include 'api/api_toprated.php';

// include ''
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="css/styles.css" />
  <title>Document</title>
  <style>

  </style>
</head>

<body>
  <section class="bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <div class="card-body">
              <h3 class="card-title">
                Selamat datang di platform film kami
              </h3>
              <p class="card-text">
                Jelajahi dunia hiburan tanpa batas melalui platform yang ramah pengguna kami. Mulai dari aksi mendebarkan hingga kisah yang menghangatkan hati, tenggelamlah dalam berbagai konten.
              </p>
              <a href="homepage.php" class="btn btn-info">Explore</a>
            </div>
          </div>
        </div>
        <div class="col-md-3" data-aos="zoom-out" data-aos-duration="2000">
          <div class="card">
            <img src="img/film1.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <p class="card-text">
                Seorang fans Liverpool menemukan mayat di belakang indomaret sebuah misteri yang tak terpecahkan
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-2" data-aos="zoom-out" data-aos-duration="2000">
          <div class="card">
            <img src="img/film2.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <p class="card-text">
                film dengan rating tinggi ini mengajarkan tentang perjuangan
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3" data-aos="zoom-out" data-aos-duration="2000">
          <div class="card">
            <img src="img/film3.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <p class="card-text">
                Sejarah ditemukannya bomb yang memporakporandakan dua kota besar jepang
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section style="padding-top: 200px;">
    <div class="container">
      <div class="card text-center" data-aos="fade-up" data-aos-duration="2000">
        <h1 class="card-title text-center mb-2 mt-3">Film Recommendation</h1>
        <div class="card-body">
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner pb-5">
              <div class="carousel-item active">
                <div class="row justify-content-center">
                  <?php
                  foreach ($toprated->results as $p) {
                  ?>
                    <div class="col-md-2">
                      <div class="card pb-3" data-aos="fade-up" data-aos-duration="2000">
                        <a href=" movie-details.php?id=<?=$p->id ?>">
                          <img src="http://image.tmdb.org/t/p/w500<?= $p->poster_path ?>" class="card-img-top" alt="..." />
                        </a>
                        <p class="mt-4"><?= $p->original_title ?></p>
                      </div>
                    </div>
                  <?php
                  }; ?>
                </div>
              </div>
            </div>
            <a href="homepage.php" class="btn btn-primary " data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">Film Lainnya</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>