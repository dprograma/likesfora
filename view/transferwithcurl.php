<?php
$firstname = "John";
$lastname = "Doe";
$data = ['firstname' => $firstname, 'lastname' => $lastname];

$string = http_build_query($data);

$url = "viewwithcurl.php";

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($curl);

if(curl_error($curl)){
    $curlerror = curl_error($curl);
}
curl_close($curl);
var_dump($response);






