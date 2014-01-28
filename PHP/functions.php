<?php

function callback($command){

    $ch = curl_init();

    if ( strpos($command['callback'], 'http') !== false ){
       curl_setopt($ch, CURLOPT_URL, $command['callback']);
    }else{
       curl_setopt($ch, CURLOPT_URL, BASE_URL . $command['callback']);
    }		
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
}


