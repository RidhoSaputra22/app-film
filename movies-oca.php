<?php
  include "conf/info.php";

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
       <style>
      .header {
    background-color: #333;
    color: #fff;
}
      /* Untuk menambahkan padding ke elemen yang memiliki class 'col-4' */
/* Untuk menambahkan padding kiri dan kanan pada elemen dengan class 'col-4' */
.col-4 {
    padding: 10px; /* Sesuaikan dengan jumlah padding yang diinginkan */
}

/* Untuk menambahkan padding kiri dan kanan pada elemen dengan class 'card' */
.card {
    padding: 20px; /* Sesuaikan dengan jumlah padding yang diinginkan */
}

/* Mengurangi padding antara kolom di dalam '.row' */
.row {
    margin: 0 -10px; /* Mengurangi margin horizontal sejauh padding yang ditambahkan */
}

/* Untuk menambahkan margin bawah pada elemen dengan class 'py-3' */
.py-3 {
    margin-bottom: 20px; /* Sesuaikan dengan jumlah margin yang diinginkan */
}
/* Untuk menambahkan padding kiri dan kanan pada elemen dengan class 'card' */
.card {
    padding: 20px; /* Padding atas dan bawah */
}

/* Untuk menambahkan padding kiri dan kanan pada konten kartu di dalam elemen 'card' */
.card .card-content {
    padding: 10px; /* Sesuaikan dengan jumlah padding yang diinginkan */
}

/* Mengurangi padding antara kolom di dalam '.row' */
.row {
    margin: 0 -10px; /* Mengurangi margin horizontal sejauh padding yang ditambahkan */
}

/* Untuk menambahkan margin bawah pada elemen dengan class 'py-3' */
.py-3 {
    margin-bottom: 20px; /* Sesuaikan dengan jumlah margin yang diinginkan */
}

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
}
    </style>

    </style>
</head>

<body style="background-image:url('../image/bg.jpeg');
                    background-size: cover; /* Menutupi seluruh area dengan gambar */
  background-position: center; /* Posisi gambar di tengah */
  background-repeat: no-repeat; /* Menghindari pengulangan gambar */
  background-attachment: fixed;
  border: none;">
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top shadow-lg">
        <div class="container">
            <a class="navbar-brand text-light" href="index.php"  style="font-weight:700">Movie TV</a>
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
                    <button class="btn btn-success mx-2" type="submit" name="submit">
                        Search
                    </button>
                </form>


            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2">
                <!-- Sidebar content goes here -->
                <?php include 'sidebar-oca.php'?>
                
            </div>
            <div class="col-md-10">
                <!-- Main content goes here -->



                
                    <div class="container-fluid">
                        <div class="row">
                        <?php
                            
                            if(isset($_POST['submit'])){
                              $input=$_POST['search'];
                              $channel=$_POST['channel'];
                              $search=$input;
                              include_once "api/api_search.php";
            
            
                              if($channel=="movie"){	
                                foreach($search->results as $results){
                      $title 		= $results->title;
                      $id 		= $results->id;
                      $release	= $results->release_date;
                      if (!empty($release) && !is_null($release)){
                        $tempyear 	= explode("-", $release);
                        $year 		= $tempyear[0];
                        if (!is_null($year)){
                          $title = $title.' ('.$year.')';
                        }
                      }
                      $backdrop 	= $results->backdrop_path;
                      if (empty($backdrop) && is_null($backdrop)){
                        $backdrop =  dirname($_SERVER['PHP_SELF']).'image/no-gambar.jpg';
                      } else {
                        $backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
                      }
            
            
                      ?>
                                        <div class="col-4 mb-4 d-flex text-center px-3">
                                        <div class="card" style="width: 18rem;">
            
            <a href="movie-details.php?id=<?=$id ?>"> <img src="<?=$backdrop?>" alt="" width=250px
                    height="250px " style="border-radius:10px;" alt="" >
            </a>
            <h6 class="mt-3"><?=$title?></h6>
            <p class="mb-0 text-stream-gray text-base mt-[10px] text-center">Rating: <?=$results->vote_average?></p>
            </div>
                                        </div>
                                  
                                       
                                      
            
            
            
                                        <?php
            
                    }
                        }elseif($channel=="tv"){
                            foreach($search->results as $results){
                      $title 		= $results->original_name;
                      $id 		= $results->id;
                      $release	= $results->first_air_date;
                      if (!empty($release) && !is_null($release)){
                        $tempyear 	= explode("-", $release);
                        $year 		= $tempyear[0];
                        if (!is_null($year)){
                          $title = $title.' ('.$year.')';
                        }
                      }
                      $backdrop 	= $results->backdrop_path;
                      if (empty($backdrop) && is_null($backdrop)){
                        $backdrop =  dirname($_SERVER['PHP_SELF']).'image/no-gambar.jpg';
                      } else {
                        $backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
                      }
                      ?>
                                     <div class="col-4 mb-4 d-flex text-center px-3">
                                        <div class="card" style="width: 18rem;">
            
            <a href="movie-details.php?id=<?=$id ?>"> <img src="<?=$backdrop?>" alt="" width=250px
                    height="250px " style="border-radius:10px;" alt="" >
            </a>
            <h6 class="mt-3"><?=$title?></h6>
            <p class="mb-0 text-stream-gray text-base mt-[10px] text-center">Rating: <?=$results->vote_average?></p>
            </div>
                                        </div>
            
            
                                        <?php
                    }
                        }
            
                              ?>
            
                                        <?php
            
                            }else{
                              ?>
            
            
                                        <?php
                    include_once "api/api_movie.php";
                    foreach($movie->results as $p){
            
                  ?>
            
                                        <div class="col-4 mb-4 d-flex text-center px-3">
            
                                        <div class="card" style="width: 18rem;">
                                        <a href="movie-details.php?id=<?=$p->id ?>"> <img
                                                    src="http://image.tmdb.org/t/p/w500<?=$p->poster_path?>"style="border-radius:10px;" alt="" width=240px></a>
                                            
                                            <h6 class="text-center mt-3"><?=$p->original_title?> ("<?=substr($p->release_date, 0, 4)?>")</h6>
                                                
                                                <p class="mb-0 text-stream-gray text-base mt-[10px] text-center">Rate : <?=$p->vote_average?> |
                                                    Vote : <?=$p->vote_count?></p>
                                        </div>
                                        </div>
            
            
            
            
            
            
            
                                        <?php
                    }
                    }
                  ?>




                        </div>

                    </div>


                





            </div>
        </div>
    </div>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>