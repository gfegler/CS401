<?php
 $thisPage = "Winter Feeding Ideas";
 
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
		
		<main>
		<section>
		
		<div>
			<ul class="tabs">
				<li><a href="#tab1">Relocate</a></li>
				<li><a href="#tab2">Swap Feeders</a></li>
				<li><a href="#tab3">String Lights</a></li>
				<li><a href="#tab4">Heat Lamp</a></li>
				<li><a href="#tab5">Dome Baffle</a></li>
				<li><a href="#tab6">Hummers Heated Delight</a></li>
				<li><a href="#tab7">Heat Tape</a></li>
			</ul>
			<div id="tab1" class="center">			
				<img src="images/windowfeeder.jpg" alt="feeder" class="centerimage">
				<h3>Location Location Location</h3>
				<p>Position the feeder to protect from cold winds and exposure. Placing a hummingbird feeder in a protected area, such as on a covered porch, next to a windbreak or under a deep eave, will keep it unfrozen for longer periods. This also keeps the feeder from getting covered with snow or ice that can clog feeding ports.  </p>
				<p>
				Alternatively, use a window feeder. Window feeders are designed to fit on to your window and are a great way to watch hummingbirds from the comfort of your home. They are also very useful in winter. Some of the heat from your home will get through your windows and this heat can help prevent the feeder from freezing.</p>
			</div>
			<div id="tab2" class="center">						
				<img src="images/snowfeeder.jpg" alt="feeder" class="centerimage">
				<h3>No heater? Swap feeders.</h3>
				<p>One very easy way to make sure your hummingbirds have a good supply of nectar is to rotate two feeders. The mix will begin to freeze around 29 degrees. Rotating the feeders throughout the day will keep the fluid moving and available to the birds.</p>
				<p>Hummingbirds do not feed at night so you can bring the feeders indoors. However, they start at dawn so get a feeder back out as early as possible. </p>			
				<p>This is also a good way to keep your feeder clean in winter as you can clean one overnight with one ready to go out fresh first thing in the morning.</p>
			</div>
			<div id="tab3" class="center">
				<img src="images/MarilynVR.jpg" alt="string lights with feeder" class="centerimage">
				<h3>Make it Festive! - String Lights</h3>
				<p>Don't enjoy setting your alarm for 5am? String lights around the feeder. Holiday lights will make your feeder look festive, and the lights will also give out a little heat which may be enough to stop it from freezing (depending on how cold it gets). LED lights do not give off much heat, and won’t help warm the feeder. If you use red colored lights, they will also attract the hummingbirds.</p>
			</div>
			<div id="tab4" class="center">
				<img src="images/heatlamp.jpg" alt="heatlamp with feeder" class="centerimage">
				<h3>Bathed in Light - Use a Heat Lamp</h3>
				<p>Your local hardware store will sell clamp on lights. These can be placed close to the feeder to keep it warm, but be careful you don’t place them too close or the heat could damage the nectar.</p>		
				<p>Purchase a 125 watt infra-red light bulb (not the red type) and screw it into a clamp-on-light fixture. Place the light 1 to 2 feet from the feeder. You can connect it to a timer to come on during freezing temperatures or leave it on all the time. Check the temperature of the syrup to 	adjust the distance.</p>
			</div>
			<div id="tab5" class="center">
				<img src="images/domebaffle.jpg" alt="dome baffle with feeder" class="centerimage">
				<h3>Under Cover - Dome Baffle</h3>
				<p>Use a dome baffle above the feeder or mount an umbrella above the nectar feeder to prevent a build-up of snow or freezing rain on the feeder. If you use an umbrella don't clean freezing rain off the umbrella to prevent damaging it, let the ice melt off naturally.</p>
			</div>
			<div id="tab6" class="center">
				<img src="images/heateddelight.jpeg" alt="heated delight with feeder" class="centerimage">
				<h3>An Ingenious Design - The Hummers Heated Delight</h3>
				<p>The Hummers Heated Delight is a tried and true option to keep a feeder heated. You can buy one at <em><a href="https://hummersheateddelight.com/xcart/" target="_blank">Hummers Heated Delight</a></em> or make one if you can solder and are handy. Designed by Bo Bolen, the system uses a 7-watt night-light bulb protected inside a plastic salsa dish.  </p>
			</div>
			<div id="tab7" class="center">
				<img src="images/heattape.jpg" alt="heat tape with feeder" class="centerimage">
				<h3>Wrap It Up - Heat Tape</h3>
				<p>Use plumbers heat tape to wrap your feeder. These flexible electric tapes are similar to a flat extension cord and can easily be wrapped around and taped to many types of feeders. Most heat tapes are equipped with a built-in thermostat in the cord. The wattage of these tapes is very low and does not draw a lot of energy. Try home supply stores and hardware stores for this product.</p>
			</div>
		</div>

		<section>
		<script src="javascripts/tabs.js" defer></script>
		</main>
		
		
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>	
		
	</body>

</html>

