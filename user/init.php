<?php


// Routes

	$usertpl 	= 'includes/templates/'; // Template Directory for user
    $userfunc	= 'includes/functions/'; // Functions Directory for user
	$usercss 	= 'layout/css/'; // Css Directory for user
    $userimgs 	= 'layout/images/'; // Css Directory for user

    $tpl 	= '../includes/templates/'; // Template Directory
    $func	= '../includes/functions/'; // Functions Directory
	$css 	= '../layout/css/'; // Css Directory
    $imgs 	= '../layout/images/'; // Css Directory
	$app   = '../';


	$adminroute = '../admin/'; 
	$userroute = '../user/';  
	$doctorroute = '../doctor/';  
	$trainerroute = '../trainer/';  


	// Include The Important Files
	include $func . 'functions.php';
	include $tpl . 'header.php';