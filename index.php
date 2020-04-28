
<?php
 $thisPage = "Home";
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
		
		<!-- Main page content -->
		<main>
			<div>
				<img class="topimage" src=https://cdn.shopify.com/s/files/1/0325/3289/files/anna-stephen_everett.jpg?v=1545490210" alt="winter Anna's hummingbirds image" />
			</div>
			
			
			
			<div class="mainmessage">
				<h2>We’re logging feeder visits by overwintering Anna’s Hummingbirds in Idaho.<br> Help us by registering your feeder site and logging observed visits!</h2>
			
			</div>
			<div class="content-highlight">
				<h2>How to care for overwintering Anna’s</h2>
				<p>Here’s what to do if an Anna’s Hummingbird chooses to stay in your yard this winter.</p>
				<p><strong>Do not adjust your sugar solution.</strong> Keep the ratio of sugar to water the same: 1 part white sugar to 4 parts water. Do not add dye.</p>
				<p><strong>Hang more than one feeder.</strong> Anna’s Hummingbirds don’t share well. Multiple feeders will reduce competition.</p>
				<p><strong>Keep the solution from freezing.</strong> Rotate your feeders throughout the day, or experiment with heat sources: Seattle Audubon Society suggests stringing Christmas lights around or under your feeder, hanging a mechanic’s trouble light near your feeding station, taping a chemical hand warmer to the feeder, or wrapping plumber’s heat tape around your feeder.</p>
				<p><strong>Offer water.</strong> A heated bath can be a big help to all birds, including hummingbirds.</p>
				<p><em>Source: <a href="http://www.seattleaudubon.org" target="_blank">Seattle Audubon Society</a></em></p>
				<p>Visit <em><a href="https://www.birdwatchingdaily.com/news/species-profiles/annas-hummingbird-our-winter-hummingbird/" target="_blank">Bird Watching Daily</a></em> to learn about Anna's wintering in the Pacific Northwest.</p>
			</div>
		</main>
		
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	
	</body>
</html>

 
		


