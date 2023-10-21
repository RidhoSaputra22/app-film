<?php
$ctp = curl_init();
curl_setopt($ctp, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=" . $apikey);
curl_setopt($ctp, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ctp, CURLOPT_HEADER, FALSE);
curl_setopt($ctp, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response12 = curl_exec($ctp);
curl_close($ctp);
$movie = json_decode($response12);


?>