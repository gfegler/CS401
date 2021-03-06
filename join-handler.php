




<?php 
session_start();

include_once 'includes/Dao.php';

// Extract all the variables from the $_POST superglobal array.
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_match = $_POST['password_match'];
$email = $_POST['email'];
$latitude = $_POST["latitude"]; 
$longitude = $_POST["longitude"];

$errors = array();


/**
 * Verify first name:
 * - between 1 and 50 characters long
 * - doesn't include numbers 0-9
 */
if(!valid_length($fname, 1, 50)) {
	$errors['fname'] = "First name is required. Must be less than 50 characters.";
	}
	elseif(!preg_match('/^[a-zA-Z]+$/', $fname)){
    $errors['fname'] = "First name should only include letters and.";
}


/**
 * Verify last name:
 * - between 1 and 50 characters long
 * - doesn't include numbers 0-9
 */
if(!valid_length($lname, 1, 50)) {
	$errors['lname'] = "Last name is required. Must be less than 50 characters.";
	}
	elseif(!preg_match('/^[a-zA-Z]+$/', $lname)){
    $errors['lname'] = "Last name should only include letters.";
}

if(!valid_length($username, 6, 50)) {
	$errors['username'] = "Username is required. Must be between 6 and 50 characters.";
}elseif(!ctype_alnum($username)){
    $errors['username'] = "Username should only include letters and numbers.";
}

/**
 * Verify that the password:
 * - at least 10 characters long
 * - password and verification password match
 * - password entered contains 1 character A-Z
 * - password entered contains 1 character a-z
 * - password entered contains 1 character 0-9
 * - Tpassword entered contains 1 special character
 */

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$special = preg_match('@[^\w]@', $password);

if(!valid_length($password, 10, 254)) {
	$errors['password'] = "Please enter a password of at least 10 characters.";
}
elseif(!$uppercase || !$lowercase || !$number || !$special) {
  $errors['password'] = "Your password must contain at least 1 upper case letter,
							1 lower case letter, 1 number and 1 special character.";
}

/**
 * Verify email:
 * - between 1 and 254 characters long
 * - is a valid @ address
 */
if(!valid_length($email, 1, 254)) {
	$errors['email'] = "Email is required. Must be less than 254 characters.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors['email'] = "Must be a valid email address.";
}


/**
 * Verify latitude:
 * - between 1 and 9 characters long
 * - in latitude format
 */

$lat = preg_match('/^[-]?(([1-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', $latitude);
if(!valid_length($latitude, 1, 9)) {
	$errors['latitude'] = "Latitude is required. Must be a valid latitude in decimal format with 6 decimal places or less.";
}
//^-?([1-8]?[0-9]\.{1}\d{1,6}$|90\.{1}0{1,6}$)
elseif(!$lat) {
	$errors['latitude'] = "Must be a valid latitude in decimal format with 6 decimal places or less.";
}	


/**
 * Verify longitude:
 * - between 1 and 9 characters long
 * - in latitude format
 */
$long = preg_match('/^[-]?((((1[0-7][0-9])|([1-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $longitude);
if(!valid_length($longitude, 1, 11)) {
	$errors['longitude'] = "Longitude is required. Must be a valid longitude in decimal format with 6 decimal places or less.";
}
elseif(!$long) {
$errors['longitude'] = "Must be a valid longitude in decimal format with 6 decimal places or less.";
}





/**
 * Function to trim and verify length of input is valid. 
 */
function valid_length($field, $min, $max) {
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}


//if all valid, then redirect the user to the sign in page.
if(empty($errors)) {
 try{
        $dao = new Dao();
        $dao->getConnectionStatus();
        if($dao->userExists($email)){
            $_SESSION['errors']['userExists'] = "User already exists";
            header('Location: join.php');
            die;
        }
		else {
            if($dao->addUser($fname, $lname, $email, $password, $username, $latitude, $longitude)){
                header('Location: signin.php');
                die;
            }
			else {
                $_SESSION['errors']['unexpectedError'] = "Something unexpected happened";
                header('Location: join.php');
                die;
            }
        }
    }
    catch (Exception $e){
        $_SESSION['errors']['unexpectedError'] = "Something unexpected happened";
        header('Location: join.php');
        die;
    }
}
else {
	$_SESSION['errors'] = $errors;
	$_SESSION['presets'] = array('fname' => htmlspecialchars($fname),
								'lname' => htmlspecialchars($lname),
								'username' => htmlspecialchars($username),
								'email' => htmlspecialchars($email),
								'latitude' => htmlspecialchars($latitude),
								'longitude' => htmlspecialchars($longitude));
	header('Location: join.php');
	die;
}
?>

















