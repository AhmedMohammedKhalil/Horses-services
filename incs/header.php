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
          <?php if(!isset($_SESSION['username'])) { ?>
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
                <a href="<?php  echo $cont."Controller.php?do=showAdminProfile"  ?>"><?php echo $_SESSION['username'] ?></a>
            </li>
            <li>
              <a href="<?php echo $cont."Controller.php?do=adminLogout"   ?>">Logout</a>
            </li>
          <?php  } elseif(isset($_SESSION['type']) && $_SESSION['type'] == "user") { 
          ?>
            <li>
                <a href="<?php  echo $cont."Controller.php?do=showUserProfile"  ?>"><?php echo $_SESSION['username'] ?></a>
            </li>
            <li>
              <a href="<?php echo $cont."Controller.php?do=userLogout"   ?>">Logout</a>
            </li>
          <?php  } elseif(isset($_SESSION['type']) && $_SESSION['type'] == "trainer") { 
          ?>  
            <li>
                <a href="<?php  echo $cont."Controller.php?do=showTrainerProfile"  ?>"><?php echo $_SESSION['username']  ?></a>
            </li>
            <li>
              <a href="<?php echo $cont."Controller.php?do=trainerLogout"   ?>">Logout</a>
            </li>
          <?php } elseif(isset($_SESSION['type']) && $_SESSION['type'] == "doctor") { 
          ?>  
            <li>
                <a href="<?php  echo $cont."Controller.php?do=showDoctorProfile"  ?>"><?php echo $_SESSION['username'] ?></a>
            </li>
            <li>
              <a href="<?php echo $cont."Controller.php?do=doctorLogout"   ?>">Logout</a>
            </li>
          <?php }}?>
        </ul>
      </div>
      <div class="container no-reverse">
        <a href="/Horses-services/" class="logo">Horses Services</a>
        <ul class="menu">
          <li><a href="/Horses-services/">Home</a></li>
          <li><a href="/Horses-services/#doctors">Doctors</a></li>
          <li><a href="/Horses-services/#trainers">Trainers</a></li>
          <li><a href="/Horses-services/#products">Products</a></li>
          <li><a href="/Horses-services/search.php">search</a></li>

        </ul>
      </div>
    </div>