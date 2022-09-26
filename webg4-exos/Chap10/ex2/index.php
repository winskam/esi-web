<?php
$token = 'tXq5R6GsojtbrtstbEXU';
$url = "https://git.esi-bru.be/api/v4/projects?private_token=$token";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
curl_close($curl);
$decoded = json_decode($curl_response);
?>
<ul>
<?php foreach ($decoded as $objet) : ?>
<li><a href="details.php?id=<?=$objet->id;?>"><?=$objet->name;?></a></li>
<?php endforeach; ?>
</ul>
