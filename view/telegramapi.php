<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//include('simple_html_dom.php');
$apiToken = "1364181746:AAEjG1Dz-qYYbZIE0mrepZZ0w6CytDwt5Ok";
$Fullcontent ="";
//base url
include "../directory.php";
$base = '{$directory}view/checkapi.php';

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);
$Fullcontent = $str;
    // send message.
    $post = [
        'chat_id' => '@likesfora',
        'text' => $Fullcontent,
        'parse_mode' => 'HTML',
    ];
    var_dump($post); 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"https://api.telegram.org/bot".$apiToken."/sendMessage?");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
// execute!
$response = curl_exec($curl);
if (curl_error($curl)) {
    $error_msg = curl_error($curl);
    echo $error_msg;
}
// close the connection, release resources used
curl_close($curl);
var_dump($response);


/*
$apiToken = "my_bot_api_token";

$data = [
    'chat_id' => '@my_channel_name',
    'text' => 'Hello world!'
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

*/
