<?php


// Routes

	$trainertpl 	= 'includes/templates/'; // Template Directory for trainer
    $trainerfunc	= 'includes/functions/'; // Functions Directory for trainer
	$trainercss 	= 'layout/css/'; // Css Directory for trainer
    $trainerimgs 	= 'layout/images/'; // Css Directory for trainer

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