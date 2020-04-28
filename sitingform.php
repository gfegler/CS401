<?php
 $thisPage = "Siting Form";
 
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

if (isset($_SESSION["access"]) && $_SESSION["access"]) {	
} else {
	header('Location: index.php');
	die;
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
		<?php require_once('includes/nav_loggedin.php'); ?>


		
		  <form name="siting_form" action="sitingform-handler.php" method="POST">
		  <fieldset>
			<h1>Add a Siting</h1>
			
			<p>
			  <label for="date">Date of Siting</label>
			  <input type="text" id = "my_date_picker" name="date" <?php preset('date');?> autocomplete="off" >
				<script> 
					$(document).ready(function() { 	
						$(function() { 
						$( "#my_date_picker" ).datepicker({ minDate: -90, maxDate: "+0M +0D" }); 
						}); 
					}) 
				</script> 
			  <?php display_error('date'); ?>
			  <p>
			
			<p>
			<label for="sex">Sex of bird</label>
			  <select name='sex' <?php preset('sex'); ?> >
				<option value="">*Please select*</option>
				<option value="male">male</option>
				<option value="female">female</option>
				<option value="unknown">unknown</option>
			  </select>
			  <?php display_error('sex'); ?>
			</p>
			<p>
			  <label for="conditions">Conditions</label>
			  <textarea name="conditions" rows="5"  ><?php preset('conditions'); ?></textarea>
			  <?php display_error('conditions'); ?>
			</p>
			<p>
			  <label for="comments">Comments</label>
			  <textarea name="comments" rows="5"  ><?php preset('comments'); ?></textarea>
			  <?php display_error('comments'); ?>
			</p>
			<?php display_error('message'); 
				display_error('unexpectedError')?>
			<div class="btn-block">
			  <button type="submit" class="submitbutton" name="sitingButton" value="Submit">Submit</button>
			</div>
			</fieldset>
		  </form>
		</div>
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>
</html>
<?php clear_errors(); ?>