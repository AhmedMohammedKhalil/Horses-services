<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $pageTitle?></title>
    <link rel="stylesheet" href="<?php echo $css?>style.css" />
	</head>
	<body>
    <div class="header" id="header">
      <div class="container reverse">
        <ul class="menu">
          <?php if(!isset($_SESSION['userName'])) { ?>
            <li>
              <a href="<?php  echo $cont."Controller.php?do=showuserLogin" ?>">User Login</a>
            </li>
            <li>
              <a href="<?php echo $cont."Controller.php?do=showdoctorLogin"  ?>">Doctor Login</a>
            </li>
            <li>
              <a href="<?php echo $cont."Controller.php?do=showtrainerLogin"  ?>">Trainer Login</a>
            </li>
            <li>
              <a href="<?php echo $cont."Controller.php?do=showadminLogin"  ?>">Admin Login</a>
            </li>
          <?php } else { 
            if(isset($_SESSION['type']) && $_SESSION['type'] == "admin") {
          ?>
            <li>
                <a href="<?php   ?>">adminName</a>
            </li>
            <li>
              <a href="<?php   ?>">Logout</a>
            </li>
          <?php  } elseif(isset($_SESSION['type']) && $_SESSION['type'] == "user") { 
          ?>
          <li>
                <a href="<?php   ?>">userName</a>
            </li>
            <li>
              <a href="<?php   ?>">Logout</a>
            </li>
          <?php  } elseif(isset($_SESSION['type']) && $_SESSION['type'] == "trainer") { 
          ?>  
          <li>
                <a href="<?php   ?>">trainerName</a>
            </li>
            <li>
              <a href="<?php   ?>">Logout</a>
            </li>
          <?php } elseif(isset($_SESSION['type']) && $_SESSION['type'] == "doctor") { 
          ?>  
          <li>
                <a href="<?php   ?>">doctorName</a>
            </li>
            <li>
              <a href="<?php   ?>">Logout</a>
            </li> 
          <?php } }?>
        </ul>
      </div>
      <div class="container no-reverse">
        <a href="/Horses-services-mvc/" class="logo">Horses Services</a>
        <ul class="menu">
          <li><a href="/Horses-services-mvc/">Home</a></li>
          <li><a href="#doctors">Doctors</a></li>
          <li><a href="#trainers">Trainers</a></li>
          <li><a href="#products">Products</a></li>
        </ul>
      </div>
    </div>