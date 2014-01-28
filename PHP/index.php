<?php
include('header.php');

$sql = "SELECT * FROM command_type ORDER BY 1 DESC";

foreach($query = $pdo->query($sql) as $command) {
?>
	<p>
		<button class="btn btn-lg btn-danger" onclick="window.location='<?php echo BASE_URL ?>add_command.php?code=<?php echo $command['code']?>'">
			<?php echo $command['name'] ?>
		</button>
	</p>
<?php

}

include('footer.php');
