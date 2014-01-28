<?php

include 'config.php';

while(true)
{
	work();
	sleep(5);
	echo ('.');
}

function work()
{
	global $pdo;
	$sql = "
		SELECT c.id, ct.callback 
		FROM command c
		INNER JOIN command_type ct on ct.id=c.command_type_id
		WHERE c.command_status = 0	
	";

	foreach($query = $pdo->query($sql) as $command) {
		print_r($command);
	
		callback($command);
    	$sqlUpdate = "UPDATE command set command_status=2 where id=" . intval($command['id']);
    	$pdo->query($sqlUpdate);
	
		sleep(1);
	}
}
