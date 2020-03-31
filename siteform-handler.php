<?php 
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
require_once 'includes/Dao.php';



$_SESSION['valid'] = true;

	// Extract all the variables from the $_POST superglobal array.
	$site_name = sanitize($_POST["site_name"]);
	$site_name = validate_sitename($site_name);
	$latitude = sanitize($_POST["latitude"]); 
	$longitude = sanitize($_POST["longitude"]);
	$feeder_description = sanitize($_POST["feeder_description"]);
	$environment_description = sanitize($_POST["environment_description"]);
	$comment = sanitize($_POST["comment"]);
	$latitude = sanitize($_POST["latitude"]);
	
	$user_id = $_SESSION['user_id'];
	
	//valildate site name
	//validate latitude
	//validate longitude

	$errors = array();



function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //$data = filter_var($data, FILTER_SANITIZE_STRING);
  return $data;
}


function validate_sitename($data) {: 
	if (strlen($data) >= 1 || strlen($data) < 81) {
        return $data;
	}
	else {
	$errors['site_name'] = "Site name is required. Must be less than 80 characters.";
	$_SESSION['valid'] = false;
	}
}


//if all valid, then redirect the user to the site submitted page.
if(empty($errors)) {
 try{
        $dao = new Dao();
        $dao->saveSite($feeder_description, $environment_description, $site_name, $comment, $latitude, $longitude, $user_id))
		$_SESSION['message'] = "Your site description has been saved."
        header('Location: site-submitted.php');
    }
    catch (Exception $e){
        var_dump($e);
        echo "<p> Site information could not be saved.</p>";
        die();
		
		
    }

}
?>