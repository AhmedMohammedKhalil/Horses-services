<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "search";
    include($inc.'header.php');
    if(isset($_GET['data']))
    {
      $data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
      extract($data);
    }
    
    
?> 

    <div class="search" style="min-height: calc(100vh - 243.4px);">
        <form action="<?php echo $cont.'Controller.php?do=makesearch';?>" method="POST">
            <input title="Search" type="search" name="search" placeholder="Searching ...." value="<?php if(isset($oldSearch)) echo $oldSearch; ?>" />
            <input type="submit" name="searching" value="Search" />
        </form>
        <?php if(isset($error)){echo "<span style='color:red;text-align:center;display:block;font-size:20px;margin-bottom:10px'>$error</span>";} ?>
    </div>
  
    



    <?php
    if(isset($doctors) ||isset($trainers)||isset($products)){
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
          <img src="<?php echo $imgs?>doctor-image.jpg" alt="doctor photo" />
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
                echo '<h2 class="title">Trainers</h2>';
            else 
                echo '<h2 class="title" style="border:none;">Trainers Not Found </h2>';
        ?>
        <div class="container">
        <?php foreach($trainers as $t)  { ?>
          <div class="box">
            <img src="<?php echo $imgs ?>horse-trainer.png" alt="trainer photo" />
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
              <img src="<?php echo $imgs ?>prod-1.jpg" alt="product photo" />
            </div>
            <h4><?php echo $p['name'] ?></h4>
            <h4><?php echo $p['price'] ?></h4>
            <?php   echo '<a class="button" href="'.$cont.'Controller.php?do=showProduct&id='.$p['id'].'">Read more</a>' ?>
          </div>
          <?php }?>
        </div>
      </div>
<?php
    }

    include($inc.'footer.php');
    ob_end_flush();