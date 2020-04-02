<?php
 $thisPage = "Your Sitings";
 
 if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

require_once 'includes/Dao.php';

try{
    $dao = new Dao();
	$user_id = $_SESSION['user_id'];
	//echo $user_id;
    $siting = $dao->getSitings($user_id);
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
		<?php require_once('includes/header.php'); ?>
		
		<!-- Navigation bar -->
		<?php require_once('includes/nav_loggedin.php'); ?>

		<!--<p>This will contain a list of links to the user's logged sitings.</p> -->
		<table class = "yourtable">
			<caption><?= $_SESSION['username'] ?>'s Anna's Hummingbird Sitings</caption>
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
				<td class="item-center"><?= htmlspecialchars($siting["date"]); ?></td>
				<td class="item-center"><?= htmlspecialchars($siting["sex"]); ?></td>
				<td class="item-left"><?= htmlspecialchars($siting["conditions"]); ?></td>
				<td class="item-left"><?= htmlspecialchars($siting["comment"]); ?></td>
			</tr>
			<?php } ?>
        </table>
		
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>

</html>