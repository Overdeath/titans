<?php
include('header.php');
$code = '';
if (isset($_GET['code'])) {
	$code = strtolower($_GET['code']);
}
if ($code == '') {
	die('code not specified');
}
$code = str_replace('%20', ' ', $code);
$code = str_replace('%C4%83', 'a', $code);
if (strpos($code, 'alarm') !== false) {
	$code = 'alarma';
}

$sql = "SELECT * FROM command_type WHERE code = " . $pdo->quote($code);

foreach($query = $pdo->query($sql) as $command) {
	$sqlInsert = "INSERT INTO command 
				(command_type_id, command_status)
			VALUES
				(" . intval($command['id']) . ", 0)";
	$pdo->query($sqlInsert);
}

?>
<p class="lead">Done!</p>

