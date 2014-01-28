<?php

include('config.php');

$callbackStart = array(
        'callback' => ALARM_BASE . 'aprinde'
);

$callbackStop = array(
        'callback' => ALARM_BASE . 'stinge'
);


callback($callbackStart);

sleep(10);

callback($callbackStop);

