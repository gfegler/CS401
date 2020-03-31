<?php
 $thisPage = "logged siting";
 
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
		<div>
			<p>Your feeder site information has been successfully submitted.</p>
		</div>	
		
		<nav>
			<ul>
				<li><a href="news1.asp">Your Sitings</a></li>
				<li><a href="sitingform.html">Add a Siting</a></li>
							
			</ul>
		</nav>
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>

</html>