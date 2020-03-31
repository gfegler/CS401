
<?php
 $thisPage = "Home";
 
 //require_once('includes/form_helper.php');
 
 session_start();
 
 
//Return true if user is authenticated, false otherwise.
function isAccessGranted() {
	if(isset($_SESSION['access']) && ($_SESSION['access'] === true)) {
		return true;
	} else {
		return false;
	}
}

if(!isAccessGranted()) {
	//redirect to sign in page.
	$errors['message'] = "You must sign in first.";
	header("Location: signin.php");
	die;
}

var_dump($_SESSION);


 $user = $_SESSION['username'];
?>
<!DOCTYPE>
<html lan="en">
 
	<!-- head element (page metadata) -->
	<?php require_once('includes/head.php'); ?>
	
	<body>
		<!-- Page header -->
		<?php require_once('includes/header.php'); ?>
		
		<!-- Navigation bar -->
		<?php require_once('includes/nav.php'); ?>
		
		<!-- Main page content -->
		<main>
			<div>
				<img class="topimage" src=https://cdn.shopify.com/s/files/1/0325/3289/files/anna-stephen_everett.jpg?v=1545490210" alt="winter Anna's hummingbirds image" />
			</div>
			<div class="mainmessage">
				<h2>Welcome <?= $_SESSION['logged_in'] ?><br><br>
				We’re logging feeder visits by overwintering Anna’s Hummingbirds in Idaho. Help us by registering your feeder site and logging observed visits!</h2>
			</div>
		</main>
				<nav>
				<ul>
							<li><a href="yoursiteform.php">Your Site</a></li>
							<li><a href="yoursitings.php">Your Sitings</a></li>
							<li><a href="sitingform.php">Add a Siting</a></li>
							
						</ul>
		</nav>
		<!-- Footer -->
		<?php require_once('includes/footer.php'); ?>
	</body>

</html>

 
		


