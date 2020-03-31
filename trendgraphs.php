<?php
 $thisPage = "Trend Graphs";
 
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
		<div>
			<p>This page will have a siting chart. Possibly using Chart.js.</p>
		</div>
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>

</html>

