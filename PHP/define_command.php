<?php
include('header.php');
$providers = array(
	1 => 'Samsung',
	2 => 'Boss'
);

$categories = array(
	1 => 'Home automation',
	2 => 'System automation',
);

if (isset($_POST) && is_array($_POST) && count($_POST) > 0) {
	$name = $_POST['command_name'];
	$code = $_POST['command_code'];
	$callback = $_POST['command_callback'];
	$provider = $_POST['provider'];
	$category = $_POST['category'];
	
	$sql = "INSERT INTO command_type 
				(name, code, callback, provider_id, category_id)
			VALUES
				(" . $pdo->quote($name) . ", " . $pdo->quote($code) . ", " . $pdo->quote($callback) . ",
				" . intval($provider) . ", " . $category . ")";
	$pdo->query($sql);
	?>
		<p class="lead">
			Callback added!
		</p>
	<?php
} else {
?> 
<form class="form-signin" role="form" method="POST" action="<?php echo BASE_URL?>define_command.php">
        <h2 class="form-signin-heading">Define new callback</h2>
        <input type="text" class="form-control" placeholder="Name" required autofocus name="command_name">
        <input type="text" class="form-control" placeholder="Code" required name="command_code">
		<input type="text" class="form-control" placeholder="Callback url" required name="command_callback">
		<select name="provider" class="form-control">
			<option value="">--Provider--</option>
			<?php
				foreach ($providers as $id => $provider) {
				?>
					<option value="<?php echo $id?>"><?php echo $provider?></option>
				<?php
				}
			?>
		</select>
		<select name="category" class="form-control">
            <option value="">--Category--</option>
            <?php
                foreach ($categories as $id => $provider) {
                ?>
                    <option value="<?php echo $id?>"><?php echo $provider?></option>
                <?php
                }
            ?>
        </select>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
      </form>
<?php
}
include('footer.php');
?>
