<?php
 $thisPage = "Sitings List";
 
 if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

require_once 'includes/Dao.php';

try{
    $dao = new Dao();
	$user_id = isset($_GET['id']) ? $_GET['id'] : '1';
	
    $siting = $dao->getSitings($user_id);
	$username = isset($_GET['username']) ? $_GET['username'] : 'Unknown';
	
	
}
catch(Exception $e){
    echo $e->getMessage();
    die();
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
			require_once('includes/nav_loggedin.php');	
		}
		?>
		<!--<p>This will contain a list of links to the user's logged sitings.</p> -->
		<table class = "yourtable">
			<caption><?= $username ?>'s Anna's Hummingbird Sitings</caption>
			<thead>
				<tr>
					<th scope="col">Date</th>
					<th scope="col">Sex</th>
					<th scope="col">Conditions</th>
					<th scope="col">Comment</th>
				</tr>
			</thead>
			<tbody>				
			<?php foreach($siting as $siting){ ?> 
			<tr>
				<td class="item-center"><?= $siting["date"]; ?></td>
				<td class="item-center"><?= $siting["sex"]; ?></td>
				<td class="item-left"><?= $siting["conditions"]; ?></td>
				<td class="item-left"><?= $siting["comment"]; ?></td>
			</tr>
			<?php } ?>
        </table>
		<div>
		<button class="returnbutton" onclick="window.location.href = 'feederwatchsites.php';">Return to Feeder Watch Sites</button>
		</div>
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>

</html>