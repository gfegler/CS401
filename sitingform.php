<?php
 $thisPage = "Siting Form";
 
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
?>
<!DOCTYPE>
<html lan="en">
 
	<!-- head element (page metadata) -->
	<?php require_once('includes/head.php'); ?>
	
	<body>
		<!-- Page header -->
		<?php require_once('includes/header.php'); ?>
		
		<!-- Navigation bar -->
		<?php require_once('includes/nav_loggedin.php'); ?>


		<div class="testbox">
		  <form name="siting_form" action="sitingform-handler.php" method="POST">
			<h1>Add a Siting</h1>
			<div class="item">
			  <p>Date of Siting</p>
			  <input type="date" name="date" required <?php preset('date'); ?> >
			  <i class="fas fa-calendar-alt"></i>
			  <?php display_error('date'); ?>
			</div>
			<div class="item">
			  <p>Sex of bird</p>
			  <select name='sex' required>
				<option value="">*Please select*</option>
				<option value="male">male</option>
				<option value="female">female</option>
				<option value="unknown">unknown</option>
			  </select>
			  <?php display_error('sex'); ?>
			</div>
			<div class="item">
			  <p>Conditions</p>
			  <textarea name="conditions" rows="5"  ><?php preset('conditions'); ?></textarea>
			  <?php display_error('conditions'); ?>
			</div>
			<div class="item">
			  <p>Comments</p>
			  <textarea name="comments" rows="5"  ><?php preset('comments'); ?></textarea>
			  <?php display_error('comment'); ?>
			</div>
			<?php display_error('message'); 
				display_error('unexpectedError')?>
			<div class="btn-block">
			  <button type="submit" class="submitbutton" name="sitingButton" value="Submit">Submit</button>
			</div>
		  </form>
		</div>
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>
</html>
<?php clear_errors(); ?>