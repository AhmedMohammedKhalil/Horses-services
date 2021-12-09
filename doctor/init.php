<?php


// Routes

	$doctortpl 	= 'includes/templates/'; // Template Directory for doctor
    $doctorfunc	= 'includes/functions/'; // Functions Directory for doctor
	$doctorcss 	= 'layout/css/'; // Css Directory for doctor
    $doctorimgs 	= 'layout/images/'; // Css Directory for doctor

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