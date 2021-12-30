<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "Trainer Details";
    include($inc.'header.php');
?>
    <div class="component-details" id="trainer">
      <div class="details">
        <img src="<?php echo $imgs.'horse-trainer.png' ?>" alt="" />
        <div class="content">
            <h2>Name</h2>
            <h2>specialization</h2>
            <h2>phone</h2>
            <p>Details</p>
            <p>Address</p>
        </div>
      </div>
    </div>
    <div class="boxes" id="previous-works">
      <h2 class="title">Cases</h2>
      <div class="container">
        <div class="info">
            <!-- foreach -->
          <div class="box">
            <img src="<?php echo $imgs.'horse-trainer.png' ?>" alt="" />
            <div class="text">
              <h3>title</h3>
              <h4>placement</h4>
              <h4>duration</h4>
              <p>
                Details   
              </p>
            </div>
          </div>
            <!-- end -->
        </div>
      </div>
    </div>
    <div class="product" id="products">
        <h2 class="title">products</h2>
        <div class="container">
          <!-- foreach -->
          <div class="box" style="text-align: center;">
            <div class="image">
              <img src="<?php echo $imgs ?>prod-1.jpg" alt="" />
            </div>
            <h4>50 KD</h4>
                <a href="#">More</a>
          </div>
            <!-- end -->
        </div>
      </div>

<?php
    include($inc.'footer.php');
    ob_end_flush();