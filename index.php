<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "Home";
    include($inc.'header.php');
    include($inc.'landing.php');
    include_once('controllers/HomeController.php');
    $data = HomeController::home();
    extract($data);
?>
      <div class="cards" id="doctors">
      <?php 
            if($doctors)
                echo '<h2 class="title">Doctors</h2>';
            else 
                echo '<h2 class="title" style="border:none;">Doctors Not Found </h2>';
        ?>
        <div class="container">
        <?php foreach($doctors as $d)  { ?>

          <div class="box">
            <img src="<?php echo $imgs?>doctor-image.jpg" alt="" />
            <div class="content">
              <h3><?php echo $d['name'] ?></h3>
              <p><?php echo $d['description'] ?></p>
            </div>
            <div class="info">
           <?php   echo '<a class="button" href="'.$cont.'Controller.php?do=showDoctor&id='.$d['id'].'">Read more</a>' ?>
            </div>
          </div>
          <?php }?>

        </div>
      </div>

      <div class="cards" id="trainers">
      <?php 
            if($trainers)
                echo '<h2 class="title">trainers</h2>';
            else 
                echo '<h2 class="title" style="border:none;">trainers Not Found </h2>';
        ?>
        <div class="container">
        <?php foreach($trainers as $t)  { ?>
          <div class="box">
            <img src="<?php echo $imgs ?>horse-trainer.png" alt="" />
            <div class="content">
              <h3><?php echo $t['name'] ?></h3>
              <p><?php echo $t['description'] ?></p>
            </div>
            <div class="info">
            <?php   echo '<a class="button" href="'.$cont.'Controller.php?do=showTrainer&id='.$t['id'].'">Read more</a>' ?>
            </div>
          </div>
          <?php }?>

        </div>
      </div>

      <div class="product" id="products">
        <?php 
            if($products)
                echo '<h2 class="title">Products</h2>';
            else 
                echo '<h2 class="title" style="border:none;">Products Not Found </h2>';
        ?>
        <div class="container">
        <?php foreach($products as $p)  { ?>
          <div class="box" style="text-align: center;">
            <div class="image">
              <img src="<?php echo $imgs ?>prod-1.jpg" alt="" />
            </div>
            <h4><?php echo $p['name'] ?></h4>
            <h2><?php echo $p['price'] ?> KD</h2>
            <?php   echo '<a class="button" href="'.$cont.'Controller.php?do=showProduct&id='.$t['id'].'">Read more</a>' ?>
          </div>
          <?php }?>
        </div>
      </div>
<?php
    include($inc.'footer.php');
    ob_end_flush();