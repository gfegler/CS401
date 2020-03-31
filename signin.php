<?php
 $thisPage = "Sign in";
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
/**
 * Prints preset for given key (if one exists).
 */
function preset($key) {
	if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) { 
		echo 'value="' . $_SESSION['presets'][$key] . '" '; 
	}
}

/**
 * Prints error for given key (if one exists).
 */
function display_error($key) {
	if(isset($_SESSION['errors'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
	<?php }
}

/**
 * Clears error data from session when we are done so they don't show
 * up on refresh or if user submits correct info next time around.
 */
function clear_errors() {
	unset($_SESSION['errors']);	
	unset($_SESSION['presets']);	
}
?>


<!DOCTYPE>
<html lan="en">
 
	<!-- head element (page metadata) -->
	<?php require_once('includes/head.php'); ?>
	
	<body>
		<!-- Page header -->
		<?php require_once('includes/header.php'); ?>
		
		<!-- Navigation bar -->
		<?php require_once('includes/nav.php'); ?>	
		<form action="login_handler.php" method="POST" autocomplete="off">
			<fieldset>
			<legend>Sign in to your account:</legend>
			<p><?php display_error('message'); ?></p>
			<p>	
				<label for="username">Username</label>	
				<input type="text" id="username" name="username" maxlength="50" <?php preset('username'); ?> >
				<?php display_error('username');?><br><br>
			</p>
			<p>				
				<label for="password">Password</label>
				<input type="text" id="password" name="password">
				<?php display_error('password');?>
			</p>
			<p>
				<?php display_error('userDoesNotExist'); 
				display_error('unexpectedError')?>
			</p>
				
			<input type="submit" value="sign in">
				
			</fieldset>
		</form>

		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>

</html>
<?php clear_errors(); ?>