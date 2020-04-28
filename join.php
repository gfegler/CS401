<?php
$thisPage = "Join";
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
		<?php require_once('includes/header.php');
		if(!isset($_SESSION['access']) || $_SESSION['access'] != true){		
		//<!-- Navigation bar -->
			require_once('includes/nav.php'); 
		}
		else {
		//<!-- Navigation bar -->
			require_once('includes/nav_loggedin.php');	
		}
		?>
	<section>
		<form id="joinForm" action="join-handler.php" method="POST" autocomplete="off">
			<fieldset>
			<legend>Create an Idaho Anna's Site Account:</legend>
			<p>
				<label for="fname">First name</label>
				<input type="text" id="fname" name="fname" maxlength="50" <?php preset('fname'); ?> >
				<?php display_error('fname'); ?>
			</p>
			<p>	
				<label for="lname">Last name</label>
				<input type="text" id="lname" name="lname" maxlength="50" <?php preset('lname'); ?>   >
				<?php display_error('lname');?>
			</p>
			<p>
				<label for="username">Choose a username</label>
				<input type="text" id="username" name="username" maxlength="50" <?php preset('username'); ?>   >
				<?php display_error('username');?>
			</p>
			<p>	
				<label for="password">Choose a password</label>
				<input type="password" id="password" name="password" maxlength="50"  >
				<?php display_error('password');?>
			</p>
			<p>	
				<label for="password_match">Confirm password</label>
				<input type="password" id="password_match" name="password_match" maxlength="254"  >
				<?php display_error('password_match');?>
			</p>
			<p>	
				<label for="email">Email Address</label>
				<input type="email" id="email" name="email" maxlength="254" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" <?php preset('email'); ?> title="email must be in characters@characters.domain format" >
				<?php display_error('email');?>
			</p>
			<p>
				<label for="coordinates">Your Feeder Site Coordinates</label> 
				<a class="coordinates" href="https://www.mapcoordinates.net/en" target="_blank">(get your coordinates)</a>
            <input type="number" step="any" name="latitude" placeholder="Latitude - decimal format"		autocomplete="off" <?php preset('latitude'); ?> >
			<?php display_error('latitude');?>
            <input type="number" step="any" name="longitude" placeholder="Longitude - decimal format" 	autocomplete="off" <?php preset('longitude'); ?> >
			<?php display_error('longitude');?>
       
			
			
			<p>
				<?php display_error('userExists'); 
				display_error('unexpectedError')?>
			</p>
				<input type="submit" value="Create Account">
			</fieldset>
		</form>	
	</section>
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>
</html>
<?php clear_errors(); ?>
		