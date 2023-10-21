<?php
  include "conf/info.php";
  $id_movie = $_GET['id'];
  include_once "api/api_movie_id.php";
  include_once "api/api_movie_video_id.php";
  include_once "api/api_movie_similar.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
    <style>
      nav{
  background-image: url('image/bg.jpeg');
  filter: blur();
  background-size: cover; /* Menutupi seluruh area dengan gambar */
  background-position: center; /* Posisi gambar di tengah */
  background-repeat: no-repeat; /* Menghindari pengulangan gambar */
  background-attachment: fixed;
  border: none;"  
}
body{
  overflow-x: hidden;
  color:white;
}
    </style>
</head>

<body style="background-image:url('../image/bg.jpeg');
                    background-size: cover; /* Menutupi seluruh area dengan gambar */
  background-position: center; /* Posisi gambar di tengah */
  background-repeat: no-repeat; /* Menghindari pengulangan gambar */
  background-attachment: fixed;
  border: none;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand text-light" href="index.php" style="font-weight:700">Movie TV</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <form action="" method="post" class="d-flex">
                    <input type="text" name="search" placeholder="Search" class="form-control me-2" aria-label="Search"
                        required>
                    <select name="channel" class="btn btn-primary" required>
                        <option value="movie" selected="selected">Movie
                        </option>
                        <option value="tv">TV Show
                        </option>
                    </select>
                    <button class="btn btn-outline-success mx-2" type="submit" name="submit">
                        Search
                    </button>
                </form>


            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <!-- Sidebar content goes here -->
                <?php include 'sidebar-oca.php'?>

            </div>
            <div class="col-lg-9">
                <!-- Main content goes here -->

                <?php 
                
                if(isset($_GET['id'])){
                  $id_movie = $_GET['id'];

                  ?>
                  <div class="d-flex justify-content-center mt-3 ">
                  <img src="<?php echo $imgurl_2 ?><?php echo $movie_id->poster_path ?>" class="border border-black shadow p-3 mb-5 bg-body-tertiary rounded shadow-lg bg-white"  >
                  </div>
          <h3 class="text-center" ><?php echo $movie_id->original_title ?></h3>
          <div class="fs-6">
         <ul type="circle">
          <li> <p ><?php echo $movie_id->tagline ?></p></li>
          <li><p>Genres : 
              <?php
                foreach($movie_id->genres as $g){
                  echo '<span>' . $g->name . '</span> ';
                }
              ?>
          </p></li>
          <li><p>Overview : <?php echo $movie_id->overview ?></p></li>
          <li><p>Release Date : <?php $rel = date('d F Y', strtotime($movie_id->release_date)); echo $rel ?></p></li>
          <li><p>Production Countries:
              <?php
                foreach($movie_id->production_countries as $pco){
                  echo $pco->name. "&nbsp;&nbsp;" ;
                }
              ?>
          </p></li>
          <li><p>Budget: $ <?php echo $movie_id->budget ?> </p></li>
          <li><p>Vote Average : <?php echo $movie_id->vote_average ?></p></li>
          <li><p>Vote Count : <?php echo $movie_id->vote_count ?></p></li>
         </ul>
          
          
          
          
          
              </div>
              <div class="text-center py-5">
                <a href="" class="btn btn-danger w-50">Lihat Trailer</a>
              </div>

                  
                  <?php

                }
                
                ?>

                






            </div>

        </div>


    </div>





    </div>
    </div>
    </div>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>