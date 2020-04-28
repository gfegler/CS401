<?php
 $thisPage = "Feeder Watch Sites";
 
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	
	require_once 'includes/Dao.php';

try{
    $dao = new Dao();
	$user_id = $_SESSION['user_id'];
    $users = $dao->getUsers();
	

}
catch(Exception $e){
    echo $e->getMessage();
    die();
}
?>


<!DOCTYPE html>
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
			require_once('includes/nav_loggedin.php');	
		}
		?>			
		
		<div>
			<div>
				<table class="usertable">
				<caption id=watchsitecaption>Feeder Watch Sites</caption>
				<thead>
					<tr>
						<th scope="col">Username</th>
						<th scope="col">Logged Sitings</th>
					</tr>
				</thead>
				<tbody>				
				<?php foreach($users as $user){ 
					$id = $user['id'];
					
					$siting = $dao->getSitings($id);
					$num_sitings = count($siting);
			
				?> 
				<tr>
					<td class="item-center"><a href="selected-user.php?username=<?= htmlspecialchars($user["username"]);?>&id=<?= $id;?>"><?= htmlspecialchars($user["username"]); ?></a></td>
					<td class="item-center"><?= count($siting); ?></td>
				</tr>
				<?php } ?>
				</table>
			
			</div>
			<div class = "mapbox">
			<div id="map" style="width: 500px; height: 500px;"></div>
				<script src="javascripts/map.js" defer></script>
			</div>
			
		</div>

		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>

</html>