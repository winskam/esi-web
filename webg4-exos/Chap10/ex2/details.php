<?php
$id = $_REQUEST["id"];
$token = 'tXq5R6GsojtbrtstbEXU';
$url = "https://git.esi-bru.be/api/v4/projects/$id?private_token=$token";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
curl_close($curl);
$decoded = json_decode($curl_response);
?>

<ul>
<li><?=$decoded->name;?></li>
<li><?=$decoded->created_at;?></li>
<li><?=$decoded->http_url_to_repo;?></li>
</ul>
