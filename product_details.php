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
            <?php if($product['photo']  == null ) {?>
              <img src="<?php echo $imgs.'prod-1.jpg'?>" alt="product photo" >
            <?php }else{ ?>
              <img src="<?php echo $files.'products/'.$product['id'].'/'.$product['photo']?>" alt="product photo">
            <?php }?>        
            <div class="content">
              <h2><?php echo $product['name'] ?></h2>
              <h2><?php echo $product['price'] ?> KD</h2>
              <p><?php echo nl2br($product['details']) ?></p>
              <?php if(isset($_SESSION['type'])) {
                if($_SESSION['type']=="user") { 
                    echo '<a class="button" href="'.$cont.'Controller.php?do=buyProduct&id='.$product['id'].'">Buy</a>';
              ?>  

                <form action="<?php echo $cont."Controller.php?do=makeReview" ?>" method="POST">
                  <div style="display:flex;justify-content:space-evenly;width:500px;margin:20px 0">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                    <div class="review">
                      <input type="radio" name="review" id="r1" value="excellent" checked> <label for="r1">Excellent</label>
                    </div>
                    <div class="review">
                      <input type="radio" name="review" id="r2" value="Bad"> <label for="r2">Bad</label>
                    </div>
                    <div class="review">
                      <input type="radio" name="review" id="r3" value="Expensive"> <label for="r3">Expensive</label>
                    </div>
                    <div class="review">
                      <input type="radio" name="review" id="r4" value="Cheap"> <label for="r4">Cheap</label>
                    </div>
                  </div>
                    <input class="button make_review" type="submit"  name="make_review" value="Make Review" />
                </form>
                                  
              <?php }}?>
            </div>
      </div>
    </div>
    <?php if(count($reviews) > 0) {?>
    <div class="boxes" id="reviews">
      <h2 class="title">Reviews</h2>
      <div class="container">
        <div class="info">
          <?php foreach($reviews as $r)  { ?>
          <div class="box">
              <?php if($r['user_photo']  == null ) {?>
                <img src="<?php echo $imgs.'user-image.jpg'?>" alt="user photo" >
              <?php }else{ ?>
                <img src="<?php echo $files.'users/'.$r['user_id'].'/'.$r['user_photo']?>" alt="user photo">
              <?php }?>            
            <div class="text">
              <h3><?php echo $r['user_name'] ?></h3>
              <p>
              <?php echo nl2br($r['review']) ?>
              </p>
            </div>
          </div>
          <?php }?> 
        </div>
      </div>
    </div>
    <?php }?>
<?php
    include($inc.'footer.php');
    ob_end_flush();