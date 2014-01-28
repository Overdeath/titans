<?php




# Curl request
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
print_p($result);
curl_close($ch)


/*
CURLOPT_POST => 1,
CURLOPT_POSTFIELDS => array(
        item1 => 'value',
        item2 => 'value2'
)
*/
