

		<div>
			<header class="header">			
				<img src="images/sprite-common.png" alt="logo" />
				<h1>Idaho Anna's
				<?php if(!isset($_SESSION['access']) || $_SESSION['access'] != true) { ?>
						<button class="floatbutton" onclick="window.location.href = 'join.php';">Join</button>
					<?php } 
					else { ?>
						<button class="floatbutton" onclick="window.location.href = 'logout.php';">Logout</button>
					<?php } ?>
				</h1>
			</header>
		<div>
			<p class="subtitle">Winter Feeder Watch</p>
		</div>
		<br>
		</div>
		
		
