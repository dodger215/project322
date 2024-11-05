<?php

require('config.php');
session_start();


function validate($conn, $input){
	$data_validate = mysqli_real_escape_string($conn, $input);
	return trim($data_validate);
}


function encryption($conn, $input){
	$data = mysqli_real_escape_string($conn, $input);
	$reverse_data = strrev($data);

	$encrypt_data = md5($data);
	$encrypt_reverse_data = md5($reverse_data);

	$blind = trim($encrypt_data . $encrypt_reverse_data);
	$reverse_blind = strrev($blind);

	$blind_encrypt = md5($blind);

	$data_encrypt = $encrypt_data . $encrypt_reverse_data . $blind . strrev($blind_encrypt . $reverse_blind);

	return trim($data_encrypt);
}

function uniqueId($conn, $name){
	$id = rand(1000000, time());
	$encrypt_id = md5($id);

	$uniqid = mysqli_real_escape_string($conn, $name . "_" . strrev($encrypt_id));

	return trim($uniqid);
}

function redirect($loc, $sta){
	header('location: ' . $loc);
	$_SESSION['status'] = $sta;
	exit(0);
}
function logouSession(){
    unset($_SESSION['auth']);
    unset($_SESSION['loggedInUserRole']);
    unset($_SESSION['loggedInUser']);
  }
?>