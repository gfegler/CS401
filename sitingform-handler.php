<?php 
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
require_once 'includes/Dao.php';

// Extract all the variables from the $_POST superglobal array.
$date = $_POST['date'];
$sex = $_POST['sex'];
$conditions = $_POST['conditions'];
$comments = $_POST['comments'];
$user_id = $_SESSION['user_id'];

$errors = array();

function checkIsAValidDate($myDateString){
    return (bool)strtotime($myDateString);
}



if(empty($_POST['date']))
{
    $errors['date'] = "Date cannot be blank";
}
elseif(!checkIsAValidDate($_POST['date']))
{
		$errors['date'] = "Enter a valid date within the past 90 days.";
}

if ($sex != 'male' && $sex != 'female' && $sex != 'unknown')
{
	$errors['sex'] = "Selection of male, female or unknown required";
}


//if(empty($_POST['conditions']))
//{
//    $errors['conditions'] = "Conditions cannot be blank";
//}

//if(empty($_POST['comments']))
//{
//    $errors['comments'] = "Comments cannot be blank";
//}

if(empty($errors)) {

	$date = date("Y-m-d H:i:s",strtotime($date));

	
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
else {
	$_SESSION['errors'] = $errors;
	$_SESSION['presets'] = array('date' => htmlspecialchars($date),
								'sex' => htmlspecialchars($sex),
								'conditions' => htmlspecialchars($conditions),
								'comments' => htmlspecialchars($comments));
								
	header('Location: sitingform.php');
	die;
}
?>

