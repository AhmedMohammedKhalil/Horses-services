<?php


// Routes

	$admintpl 	= 'includes/templates/'; // Template Directory for admin
    $adminfunc	= 'includes/functions/'; // Functions Directory for admin
	$admincss 	= 'layout/css/'; // Css Directory for admin
    $adminimgs 	= 'layout/images/'; // Css Directory for admin

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