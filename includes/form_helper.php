<?php

//session_start();

/**
* Prints preset for given key (if one exists).
*/
function preset($key) {
	if(isset($_SESSION['presets']['key'] && !empty($_SESSION['presets'][$key])) {
		echo 'value="' . $_SESSION['presets'][$key] . '" ';
	}
	unset($_SESSION['presets'][$key]);
}

/**
* Prints error for given key (if one exists).
*/
function display_error($key) {
	if(isset($_SESSION['errors'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
	<?php }
	unset($_SESSION['errors'][$key]);
}
		
/**
* Validates that the length of the given field is between min and max.
* If no max is provided, assuems max length of 254.
* If no min is provided, assumes min length of 0.
*/
function valid_length($field, $min = 0, $max = 254) {
	$trimmed = trim($field);
	return(strelen($trimmed) >= $min && strlen($trimmed) <= $max);
}

/**
* Redirects the user to the specified location, setting the errors index of the 
* current session to the given associatie array and the presets index of the
* current session to the given associative array.
*/
function redirect_error($location, $errors, $presets = NULL) {
	$_SESSION['errors'] = $errors;
	if($presets) {
		$_SESSION['presets'] = $presets;
	}
	header("Location: $location");
	die;
}

/**
* Redirects the user to the specified location, setting the user index of the 
* current session to the given associatie array.
*/
function redirect_success($location, $user = NULL) {
if($user) {
	$_SESSION['user'] = $user;
}
header("Location: $location");
}
?>