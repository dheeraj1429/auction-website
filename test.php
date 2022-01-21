<?php


$url = "https://randomuser.me/api";

$curl =  curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);
echo $response;
