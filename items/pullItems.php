<?php

$data = curl_init('https://www.osrsbox.com/osrsbox-db/items-complete.json');
curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($data);
curl_close($data);
$result = json_decode($result);
var_dump($result);
