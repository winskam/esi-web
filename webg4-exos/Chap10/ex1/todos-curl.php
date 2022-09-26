<?php

$url = 'https://jsonplaceholder.typicode.com/todos/200';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
var_dump($curl_response);
curl_close($curl);
$decoded = json_decode($curl_response);
print_r($decoded);
var_dump($decoded->id);