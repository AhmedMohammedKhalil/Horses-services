<?php

	$pageTitle = 'Home';
	include 'init.php';
    include $tpl.'landing.php'
?>
	<!-- Start doctor -->
	<div class="cards" id="cards">
      <h2 class="main-title">Doctors</h2>
      <div class="container">
        <div class="box">
          <img src="<?php echo $imgs.'doctor-image.jpg' ?>" alt="" />
          <div class="content">
            <h3>Doctor Name</h3>
            <p>Details about Doctor</p>
          </div>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
        <div class="box">
          <img src="<?php echo $imgs.'doctor-image-1.jpg' ?>" alt="" />
          <div class="content">
            <h3>Doctor Name</h3>
            <p>Details about Doctor</p>
          </div>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
        <div class="box">
          <img src="<?php echo $imgs.'doctor-image.jpg' ?>" alt="" />
          <div class="content">
            <h3>Doctor Name</h3>
            <p>Details about Doctor</p>
          </div>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
        <div class="box">
          <img src="<?php echo $imgs.'doctor-image-1.jpg' ?>" alt="" />
          <div class="content">
            <h3>Doctor Name</h3>
            <p>Details about Doctor</p>
          </div>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- End doctors -->

	<!-- Start trainer -->
	<div class="cards" id="cards">
      <h2 class="main-title">Trainers</h2>
      <div class="container">
        <div class="box">
          <img src="<?php echo $imgs.'horse-trainer.png' ?>" alt="" />
          <div class="content">
            <h3>trainer name</h3>
            <p>details about trainer</p>
          </div>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
        <div class="box">
          <img src="<?php echo $imgs.'horse-trainer-1.jpg' ?>" alt="" />
          <div class="content">
            <h3>trainer name</h3>
            <p>details about trainer</p>
          </div>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
        <div class="box">
          <img src="<?php echo $imgs.'horse-trainer.png' ?>" alt="" />
          <div class="content">
            <h3>trainer name</h3>
            <p>details about trainer</p>
          </div>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
        <div class="box">
          <img src="<?php echo $imgs.'horse-trainer-1.jpg' ?>" alt="" />
          <div class="content">
            <h3>trainer name</h3>
            <p>details about trainer</p>
          </div>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- End trainer -->

	<!-- Start products -->
    <div class="product" id="product">
      <h2 class="main-title">product</h2>
      <div class="container">
        <div class="box" style="text-align: center;">
          <div class="image">
            <img src="<?php echo $imgs.'prod-1.jpg'?>" alt="" />
          </div>
          <h4>50$</h4>
		      <a href="#">More</a>
        </div>
        <div class="box" style="text-align: center;">
          <div class="image">
            <img src="<?php echo $imgs.'prod-2.jpg'?>" alt="" />
          </div>
          <h4>30$</h4>
		  <a href="#">More</a>
        </div>
        <div class="box" style="text-align: center;">
          <div class="image">
            <img src="<?php echo $imgs.'prod-3.jpg'?>" alt="" />
          </div>
          <h4>24$</h4>
		      <a href="#">More</a>
        </div>
        <div class="box" style="text-align: center;">
          <div class="image">
            <img src="<?php echo $imgs.'prod-4.jpg'?>" alt="" />
          </div>
          <h4>40$</h4>
		  <a href="#">More</a>
        </div>
      </div>
    </div>
    <!-- End products -->
<?php
	include $tpl . 'footer.php'; 
?>