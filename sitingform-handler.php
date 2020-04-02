<?php 
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
require_once 'includes/Dao.php';

// Extract all the variables from the $_POST superglobal array.

function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate_date($date) {

	$test_date  = explode('/', $date);
	if (count($test_date) == 3) {
		if (checkdate($test_date[0], $test_date[1], $test_date[2])) 
		{
        // valid date ...
		} else 
		{
        // problem with dates ...
		}
	} 	
	else {
    // problem with input ...
	}
}


$errors = array();

if(isset($_POST["sitingButton"]) && empty($errors)) {
	$date = $_POST['date'];
	$date = date("Y-m-d H:i:s",strtotime($date));
	$sex = $_POST['sex'];
	$conditions = $_POST['conditions'];
	$comments = $_POST['comments'];
	$user_id = $_SESSION['user_id'];
	
	try
	{
		$dao = new Dao();
		$dao->saveSiting($date, $sex, $conditions, $comments, $user_id);
		header('Location: yoursitings.php');
		die;
	}
	catch(Exception $e) 
	{
		echo $e->getMessage();
        $_SESSION['errors']['unexpectedError'] = "Something unexpected happened";
        header('Location: signin.php');
        die;
	}
}

?>

