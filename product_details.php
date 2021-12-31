<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "Product Details";
    include($inc.'header.php');
    $data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
    extract($data);
    $product=$product[0];
?>
    <div class="component-details" id="product">
      <div class="details">
        <img src="<?php echo $imgs.'prod-1.jpg' ?>" alt="" />
        <div class="content">
            <h2><?php echo $product['name'] ?></h2>
            <h2><?php echo $product['price'] ?> KD</h2>
            <p><?php echo $product['details'] ?></p>
            <a href="#">Buy</a>
        </div>
      </div>
    </div>
<?php
    include($inc.'footer.php');
    ob_end_flush();