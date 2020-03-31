<?php 
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
require_once 'includes/Dao.php';

$site_name=$latitude=$longitude=$feeder_description=$environment_description=$comment=$user_id=$email="";

$_SESSION['valid'] = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$site_name = sanitize($_POST["site_name"]);
	$site_name = validate_sitename($site_name);
	$latitude = sanitize($_POST["latitude"]); 
	$longitude = sanitize($_POST["longitude"]);
	$feeder_description = sanitize($_POST["feeder_description"]);
	$environment_description = sanitize($_POST["environement_description"]);
	$comment = sanitize($_POST["comment"]);
	$latitude = sanitize($_POST["latitude"]);
	
	$user_id = $_SESSION['user_id'];
	
	//valildate site name
	//validate latitude
	//validate longitude
}


function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //$data = filter_var($data, FILTER_SANITIZE_STRING);
  return $data;
}


function validate_sitename($data) {
	if (strlen($data) >= 1 || strlen($phone_to_check) < 81) {
        return $data;
	}
	else {
	$_SESSION['sitename_err'] = "Site name is required. Must be less than 80 characters.";
	$_SESSION['valid'] = false;
	}
}

if($_SESSION['valid'])
{
$dao = new Dao();
$dao->saveSite($feeder_description, $environment_description, $site_name, $comment, $latitude, $longitude, $user_id);
$_SESSION['message'] = "Your site data has been saved.";
header('Location: index.php');
}
else{
$_SESSION['formInput'] = $_POST;
header('Location: product.php');
}
exit;
?>
  
  
  

 
