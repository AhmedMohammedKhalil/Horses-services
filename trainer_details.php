<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "Trainer Details";
    include($inc.'header.php');
    $data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
    extract($data);
    $trainer=$trainer[0];
?>
    <div class="component-details" id="trainer">
      <div class="details">
            <?php if($trainer['photo']  == null ) {?>
                <img src="<?php echo $imgs.'horse-trainer.png'?>" alt="" >
              <?php }else{ ?>
                <img src="<?php echo $files.'trainers/'.$trainer['id'].'/'.$trainer['photo'] ?>" alt="">
              <?php }?>        <div class="content">
            <h2><?php echo $trainer['name'] ?></h2>
            <h2><?php echo $trainer['address'] ?></h2>
            <h2><?php echo $trainer['phone'] ?></h2>
            <p><?php echo $trainer['description'] ?></p>
        </div>
      </div>
    </div>
    <div class="boxes" id="previous-works">
     
      <?php 
            if($previous_works)
                echo '<h2 class="title"> Previous works</h2>';
            else 
                echo '<h2 class="title">Previous works Not Found </h2>';
      ?>
      <div class="container">
        <div class="info">
        <?php foreach($previous_works as $w)  { ?>
          <div class="box">
            <img src="<?php echo $imgs.'horse-trainer.png' ?>" alt="" />
            <div class="text">
              <h3><?php echo $w['job_title'] ?></h3>
              <h4><?php echo $w['placement'] ?></h4>
              <h4><?php echo $w['job_estimation'] ?></h4>
              <p>
              <?php echo $w['details'] ?> 
              </p>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
    <div class="product" id="products">
        <?php 
            if($products)
                echo '<h2 class="title">products</h2>';
            else 
                echo '<h2 class="title" style="text-decoration:none !important;">products Not Found </h2>';
      ?>
        <div class="container">
        <?php foreach($products as $p)  { ?>
          <div class="box" style="text-align: center;">
            <div class="image">
              <img src="<?php echo $imgs ?>prod-1.jpg" alt="" />
            </div>
            <h4><?php echo $p['name'] ?></h4>
            <h4><?php echo $p['price'] ?> KD</h4>
            <?php   echo '<a class="button" href="'.$cont.'Controller.php?do=showProduct&id='.$p['id'].'">Read more</a>' ?>
          </div>
          <?php }?>
        </div>
      </div>

<?php
    include($inc.'footer.php');
    ob_end_flush();