<?php
 $thisPage = "Your Site Form";
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
		<?php require_once('includes/nav_loggedin.php'); ?>

    <div class="testbox">
	  <form id="siteForm" action="siteform-handler.php" method="POST" autocomplete="off">
	  
        <h1>Your Site</h1>
        <h5>Information about your feeder location</h5>
        <div class="item">
          <p>Site name</p>
          <input type="text" name="site name" autocomplete="off" <?php preset('site_name'); ?> >
				<?php display_error('site_name');?>
        </div>
		
		<div class="item">
          <p>Coordinates <a class="coordinates" href="https://www.mapcoordinates.net/en" target="_blank">(get your coordinates)</a>
		  </p>	  
          <div class="name-item">
            <input type="number" step="any" name="name" placeholder="Latitude - decimal format"		autocomplete="off" <?php preset('latitude'); ?> >
            <input type="number" step="any" name="name" placeholder="Longitude - decimal format" 	autocomplete="off" <?php preset('longitude'); ?> >
          </div>
        </div>
		
		<div class="item">
          <p>What's your feeder setup? How many? Are you using heaters and if so, what type?</p>
		  <textarea rows="6"></textarea >
		</div>
		<div class="item">
          <p>What's the lay of the land? Describe vegetation, special features, any factors that might influence bird visitation?</p>
          <textarea rows="6"></textarea>
		</div>
		<div class="item">
          <p>Other comments?</p>
          <textarea rows="6"></textarea>
		</div>
		<p>
				<?php display_error('unexpectedError')?>
			</p>
        <div class="btn-block">
          <button type="submit" class="submitbutton" href="/">submit</button>
        </div>
      </form>
    </div>
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>
</html>
<?php clear_errors(); ?>