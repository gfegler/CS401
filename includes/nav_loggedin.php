<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}
?>		
		
		<div>
			<nav>
				<ul>
					<li><a href="index.php" class="<?php active('index.php');?>">Home</a></li>
					<li><a href="trendgraphs.php" class="<?php active('trendgraphs.php');?>">Trend Graphs</a></li>
					<li><a href="feederwatchsites.php" class="<?php active('feederwatchsites.php');?>">Feeder Watch Sites</a></li>
					<li class="dropdown">
						<a class="dropbtn"><?= $_SESSION['username'] ?> - Your Data</a>
						<div class="dropdown-content">
						<!--	<a href="yoursiteform.php" class="<?php active('yoursiteform');?>">Your Site</a> -->
							<a href="yoursitings.php" class="<?php active('yoursitings.php');?>">Your Sitings</a>
							<a href="sitingform.php" class="<?php active('sitingform.php');?>">Add a Siting</a>
						</div>					
					</li>
				</ul>
			</nav>
		</div>	