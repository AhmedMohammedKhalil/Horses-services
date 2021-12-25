<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "Home";
    include($inc.'header.php');
    include($inc.'landing.php');
?>
      <div class="cards" id="doctors">
        <h2 class="title">Doctors</h2>
        <div class="container">
          <div class="box">
            <img src="<?php echo $imgs?>doctor-image.jpg" alt="" />
            <div class="content">
              <h3>Doctor Name</h3>
              <p>Details about Doctor</p>
            </div>
            <div class="info">
              <a href="">Read More</a>
            </div>
          </div>
          <div class="box">
            <img src="<?php echo $imgs ?>doctor-image-1.jpg" alt="" />
            <div class="content">
              <h3>Doctor Name</h3>
              <p>Details about Doctor</p>
            </div>
            <div class="info">
              <a href="">Read More</a>
            </div>
          </div>
          <div class="box">
            <img src="<?php echo $imgs ?>doctor-image.jpg" alt="" />
            <div class="content">
              <h3>Doctor Name</h3>
              <p>Details about Doctor</p>
            </div>
            <div class="info">
              <a href="">Read More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="cards" id="trainers">
        <h2 class="title">Trainers</h2>
        <div class="container">
          <div class="box">
            <img src="<?php echo $imgs ?>horse-trainer.png" alt="" />
            <div class="content">
              <h3>trainer name</h3>
              <p>details about trainer</p>
            </div>
            <div class="info">
              <a href="">Read More</a>
            </div>
          </div>
          <div class="box">
            <img src="<?php echo $imgs ?>horse-trainer-1.jpg" alt="" />
            <div class="content">
              <h3>trainer name</h3>
              <p>details about trainer</p>
            </div>
            <div class="info">
              <a href="">Read More</a>
            </div>
          </div>
          <div class="box">
            <img src="<?php echo $imgs ?>horse-trainer.png" alt="" />
            <div class="content">
              <h3>trainer name</h3>
              <p>details about trainer</p>
            </div>
            <div class="info">
              <a href="">Read More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="product" id="products">
        <h2 class="title">products</h2>
        <div class="container">
          <div class="box" style="text-align: center;">
            <div class="image">
              <img src="<?php echo $imgs ?>prod-1.jpg" alt="" />
            </div>
            <h4>50 KD</h4>
                <a href="#">More</a>
          </div>
          <div class="box" style="text-align: center;">
            <div class="image">
              <img src="<?php echo $imgs ?>prod-2.jpg" alt="" />
            </div>
            <h4>30 KD</h4>
            <a href="#">More</a>
          </div>
          <div class="box" style="text-align: center;">
            <div class="image">
              <img src="<?php echo $imgs ?>prod-3.jpg" alt="" />
            </div>
            <h4>24 KD</h4>
                <a href="#">More</a>
          </div>
        </div>
      </div>
<?php
    include($inc.'footer.php');
    ob_end_flush();

