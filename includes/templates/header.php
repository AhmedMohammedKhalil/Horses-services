<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php getTitle() ?></title>
		<!-- style -->
		<link rel="stylesheet" href="<?php echo $css ?>normalize.css" />
		<link rel="stylesheet" href="<?php echo $css ?>all.min.css" />
		<link rel="stylesheet" href="<?php echo $css ?>style.css" />
		<!-- fonts -->
		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
	</head>
	<body>
	<!-- Start Header -->
    <div class="header" id="header">
		<div class="container reverse">
			<!-- make auth with session for display or not  -->
			<ul class="main-nav">
				<li style="position:relative">
					<a href="#">Login</a>
					<div class="auth-menu">
					<ul class="links">
						<li>
							<a href="<?php echo $userroute . 'login.php'?>"><i class="far fa-comments fa-fw"></i> User</a>
						</li>
						<li>
							<a href="<?php echo $doctorroute . 'login.php'?>"><i class="far fa-user fa-fw"></i> Doctor</a>
						</li>
						<li>
							<a href="<?php echo $adminroute . 'login.php'?>"><i class="far fa-building fa-fw"></i> Admin</a>
						</li>
						<li>
							<a href="<?php echo $trainerroute . 'login.php'?>"><i class="far fa-check-circle fa-fw"></i> Trainer</a>
						</li>
					</ul>
					</div>
				</li>
				<li style="position:relative">
					<a href="#">Register</a>
					<div class="auth-menu">
					<ul class="links">
						<li>
							<a href="<?php echo $userroute . 'register.php'?>"><i class="far fa-comments fa-fw"></i> User</a>
						</li>
						<li>
							<a href="<?php echo $doctorroute . 'register.php'?>"><i class="far fa-user fa-fw"></i> Doctor</a>
						</li>
						<li>
							<a href="<?php echo $trainerroute . 'register.php'?>"><i class="far fa-check-circle fa-fw"></i> Trainer</a>
						</li>
					</ul>
					</div>
				</li>
			</ul>
		</div>
		<div class="container no-reverse">
			<a href="<?php echo $app.'index.php'?>" class="logo">Horses Services</a>
			<ul class="main-nav">
				<li><a href="<?php echo $app.'index.php'?>">Home</a></li>
				<li><a href="#doctors">Doctors</a></li>
				<li><a href="#trainer">Trainers</a></li>
				<li><a href="#products">Products</a></li>
			</ul>
		</div>
    </div>
    <!-- End Header -->