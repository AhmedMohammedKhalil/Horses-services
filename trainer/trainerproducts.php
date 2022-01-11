<?php
	ob_start();
	session_start();
	$pageTitle = 'Trainer Products';
	include 'init.php';
	$headerTitle = 'Trainer Products';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
	}
?>
<div class="product" id="products">
      <h2 class="title">products</h2>
    <div  style="display: flex;">
            <a class="box_a" href="<?php echo $cont."Controller.php?do=addProduct" ?>">Add Products</a>         
    </div>
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
            <h4><?php echo $p['price'] ?> KD</h4>
            <div style="display: flex;">
                <?php   echo '<a href="'.$cont.'Controller.php?do=showProduct&id='.$p['id'].'">Show</a>' ?>
                <?php   echo '<a href="'.$cont.'Controller.php?do=editProduct&id='.$p['id'].'">Edit</a>' ?>
                <?php   echo '<a href="'.$cont.'Controller.php?do=deleteProduct&id='.$p['id'].'">Delete</a>' ?>
            </div>
        </div>
        <?php }?> 
        </div>
</div>
    

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>