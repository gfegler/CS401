<?php
 $thisPage = "Your Site Form";
 if(!isset($_SESSION)) 
	{ 
		session_start(); 
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
	  <form id="siteForm" action="siteform-handler2.php" method="POST" autocomplete="off">
	  
        <h1>Your Site</h1>
        <h5>Information about your feeder location</h5>
        <div class="item">
          <p>Site name</p>
          <input type="text" name="site_name" autocomplete="off" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['site_name'] : ''; ?>" required>
			<?php
				if (isset($_SESSION['site_name_err'])) {
					echo '<div id = "err">' . $_SESSION['site_name_err'] . '</div>';
				}
				unset($_SESSION['site_name_err']);
			?>
        </div>
		
		<div class="item">
          <p>Coordinates <a class="coordinates" href="https://www.mapcoordinates.net/en" target="_blank">(get your coordinates)</a>
		  </p>	  
          <div class="name-item">
            <input type="number" step="any" name="latitude" placeholder="Latitude - decimal format" autocomplete="off" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['latitude'] : ''; ?>" required>
            <?php
				if (isset($_SESSION['latitude_err'])) {
					echo '<div id = "err">' . $_SESSION['latitude_err'] . '</div>';
				}
				unset($_SESSION['latitude_err']);
			?>
			
			<input type="number" step="any" name="longitude" placeholder="Longitude - decimal format" 	autocomplete="off" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['longitude'] : ''; ?>" required>
          </div>
        </div>
		
		<div class="item">
		  <p>What's your feeder setup? How many? Are you using heaters and if so, what type?</p>
		  <textarea id="feeder_description" name="feeder_description" rows="6" required>
		  <?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['feeder_description'] : ''; ?>
		  </textarea >
		</div>
		
		<div class="item">
          <p>What's the lay of the land? Describe vegetation, special features, any factors that might influence bird visitation?</p>
          <textarea id="environment_description" name="environment_description" rows="6" required>
		  <?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['environment_description'] : ''; ?>
		  </textarea >
		</div>
		
		<div class="item">
          <p>Other comments?</p>
          <textarea id="comments" name="comments" rows="6" required>
		  <?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['comments'] : ''; ?>
		  </textarea >
		</div>
		<p>
				
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
