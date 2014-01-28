<?php
include('config.php');

$sql = "SELECT * FROM sms ORDER BY 1 DESC";

$smsText = urlencode('Hacked by TITANS');

foreach ($query = $pdo->query($sql) as $sms) {
	$phoneNo = $sms['phone'];
	$command = array(
		'callback' => SMS_BASE . 'sendsms?phone=' . $phoneNo . '&text=' . $smsText . '&password=parolamonica'
	);
	callback($command);
}
