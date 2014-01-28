<?php

$from='+15128723452';
$accountsid='AC347cdcf6616293405d185c230e429db4';
$authtoker='1633a20ce7f7ffe08cbc5243323b8d19';


require 'twilio-sms/Services/Twilio.php';

$client  = new Services_Twilio($accountsid, $authtoker);


$people = array(
    "+40725222221" => "Alex Dan");

foreach ($people as $number=>$name) {
    $sms = $client->account->sms_messages->create(
            $from,
            $number,
            "Hey $name , you have been hacked!"
    );
    echo "Sms send to $name";

}
