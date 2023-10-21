<?php


$cti = curl_init();
curl_setopt($cti, CURLOPT_URL, "http://api.themoviedb.org/3/tv/".$id_tv."?api_key=" . $apikey);
curl_setopt($cti, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($cti, CURLOPT_HEADER, FALSE);
curl_setopt($cti, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response14 = curl_exec($cti);
curl_close($cti);
$tv_id = json_decode($response14);


?>