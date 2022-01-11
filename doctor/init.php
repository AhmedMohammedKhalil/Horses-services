<?php


// Routes
	$models = "../models/";
	$cont 	= '../controllers/'; 
    $func	= '../functions/'; 
	$css 	= '../assets/css/'; 
    $imgs 	= '../assets/images/'; 
	$inc  = "../incs/";
	$app   = '../';
	$files = "../files/";


	$adminroute = '../admin/'; 
	$userroute = '../user/';  
	$doctorroute = '../doctor/';  
	$trainerroute = '../trainer/';

	if(isset($valid)) {
		if(!isset($_SESSION['username'])) {
			header("location: {$app}");
		}  
		if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin') {
			header("location: {$adminroute}profile.php");
		}
		if(isset($_SESSION['type']) && $_SESSION['type'] == 'trainer') {
			header("location: {$trainerroute}profile.php");
		}
		if(isset($_SESSION['type']) && $_SESSION['type'] == 'user') {
			header("location: {$userroute}profile.php");
		}

		
	}
