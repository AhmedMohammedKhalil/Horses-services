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
            <?php if($d['photo']  == null ) {?>
              <img src="<?php echo $imgs.'doctor-image.jpg'?>" alt="" >
            <?php }else{ ?>
              <img src="<?php echo $files.'doctors/'.$d['id'].'/'.$d['photo']?>" alt="">
            <?php }?>
            <div class="content">
              <h3><?php echo $d['name'] ?></h3>
              <p class="text-overflow"><?php echo nl2br($d['description']) ?></p>
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
              <?php if($t['photo']  == null ) {?>
                <img src="<?php echo $imgs.'horse-trainer.png'?>" alt="" >
              <?php }else{ ?>
                <img src="<?php echo $files.'trainers/'.$t['id'].'/'.$t['photo'] ?>" alt="">
              <?php }?>
            <div class="content">
              <h3><?php echo $t['name'] ?></h3>
              <p class="text-overflow"><?php echo nl2br($t['description']) ?></p>
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
              <?php if($p['photo']  == null ) {?>
                <img src="<?php echo $imgs.'prod-1.jpg'?>" alt="" >
              <?php }else{ ?>
                <img src="<?php echo $files.'products/'.$p['id'].'/'.$p['photo']?>" alt="">
              <?php }?>
            </div>
            <h4><?php echo $p['name'] ?></h4>
            <h2><?php echo $p['price'] ?> KD</h2>
            <?php   echo '<a class="button" href="'.$cont.'Controller.php?do=showProduct&id='.$p['id'].'">Read more</a>' ?>
          </div>
          <?php }?>
        </div>
      </div>
<?php
    include($inc.'footer.php');
    ob_end_flush();