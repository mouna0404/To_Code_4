<?php
$curl_handle = curl_init();

$url = "https://gorest.co.in/public-api/product-categories".$_GET["id"];


curl_setopt($curl_handle, CURLOPT_URL, $url);


curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

$curl_data = curl_exec($curl_handle);

curl_close($curl_handle);

$response_data = json_decode($curl_data);



echo json_encode($response_data);
?>
