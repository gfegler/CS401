<?php
	require_once 'includes/Dao.php';
	
	$dao = new Dao();
	
	//$exists = $dao->userExists('bigbird@gmail.com');
	//var_dump($exists);
	
	$fname = "Peter";
	$lname = "Sibley";
	$username = "sibleyguide";
	$email = NULL;
	$password = "superSECRET11!!";
	

	echo $dao->getConnectionStatus();
	
	if($dao->userExists($email)) {
		echo "Can't add user Already exists.";
	} 
	else {
		if($dao->addUser($fname, $lname, $email, $password, $username)) {
				echo "successfully added user: $email";
		} else {
			echo "On no! Something unexpected happened";
		}
	}
?>