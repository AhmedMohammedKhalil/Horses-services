<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "Product Details";
    include($inc.'header.php');
?>
    <div class="component-details" id="product">
      <div class="details">
        <img src="<?php echo $imgs.'prod-1.jpg' ?>" alt="" />
        <div class="content">
            <h2>Name</h2>
            <h2>150 KD</h2>
            <p>Details</p>
            <a href="#">Buy</a>
        </div>
      </div>
    </div>
<?php
    include($inc.'footer.php');
    ob_end_flush();