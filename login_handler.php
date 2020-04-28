<?php 


require_once ('includes/Dao.php');

if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

// Extract variables from the $_POST superglobal array.
$username = $_POST['username'];
$password = $_POST['password'];




$errors = array();


if(!valid_length($username, 1, 50)) {
	$errors['username'] = "Username required.";
}

if(!valid_length($password, 1, 254)) {
	$errors['password'] = "Password required.";
}


/**
 * Function to trim and verify length of input is valid. 
 */
function valid_length($field, $min, $max) {
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}


/**
 * If no errors are present, then check if the user's username is in the database,
 * and redirect to the home page.
 * Else, if the user is not in the database,then redirect them to the registration
 * page. 
 */
if(empty($errors)){
    try{
        $dao = new Dao();
        //if the user is found by the username, then they are logged in and redirected to the home page
        $user = $dao->validateUser($username, $password);
		if($user) {
			$_SESSION['access'] = true;
			session_regenerate_id(true);
			$_SESSION['username'] = $user['username'];
			$_SESSION['user_id'] = $user['user_id'];

            header('Location: index.php');
            die;
        //if the user does not exist by username, then redirect to registration page
        }else {
            $_SESSION['errors']['userDoesNotExist'] = "Invalid username or password";
			$_SESSION['presets'] = array('username' => htmlspecialchars($username));
            header('Location: signin.php');
            die;
        }
    }
    //catch an unexpected error
    catch (Exception $e){
		echo $e->getMessage();
        $_SESSION['errors']['unexpectedError'] = "Something unexpected happened";
        header('Location: signin.php');
        die;
    }
}
else{
    $_SESSION['errors'] = $errors;
    $_SESSION['presets'] = array('username' => htmlspecialchars($username));
    header('Location: signin.php');
    die;
}
?>

<p>Username: <?=htmlspecialchars($username) ?></p>
<p>Password: <?=htmlspecialchars($password) ?></p>
