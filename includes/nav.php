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
					<li><a href="signin.php" class="<?php active('signin.php');?>" >Sign in to Your Data</a></li>
				</ul>
			</nav>
		</div>	