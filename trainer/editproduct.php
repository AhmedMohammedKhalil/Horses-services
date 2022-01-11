<?php
	ob_start();
	session_start();
	$pageTitle = 'Edit Product';
  $valid="true";

	include 'init.php';
	$headerTitle = 'Edit Product';
	include $inc.'header.php';
	if(isset($_GET['error']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		$errors = json_decode($_GET['error'],JSON_OBJECT_AS_ARRAY);
		extract($data);
	}
  if(isset($_GET['product']))
	{
		$product = json_decode($_GET['product'],JSON_OBJECT_AS_ARRAY);
    $product=$product[0];
	}

?>
   <div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Edit Product</h2>
            <ol>
            <?php 
            if(isset($errors))
            {
            foreach($errors as $e){
                echo "<li style='list-style-type:type; text-align:left;color:red'>".$e."</li>";
            }
            }    
            ?>
            </ol>
            <form name="editProduct" method="POST" action="<?php echo $cont."Controller.php?do=updateProduct"?>" enctype="multipart/form-data">
              <input class="input" type="text" required placeholder="Enter Job Title" required name="category" value="<?php if(isset($_GET['error'])){echo $category ;} else {echo $product['category'];}?>"/>
              <input class="input" type="text" required placeholder="Enter job estimation" required name="name" value="<?php if(isset($_GET['error'])){echo $name ;}else {echo $product['name'];}?>"/>
              <input class="input" type="text" required placeholder="Enter job estimation" required name="price" value="<?php if(isset($_GET['error'])){echo $price ;}else {echo $product['price'];}?>"/>
              <input type="file" name="photo" id="photo" accept="image/jpg,image/jpeg,image/png" />
              <input type="hidden" name="product_id" value="<?php if(isset($_GET['error'])){echo $id ;}else {echo $product['id'];}?>">
              <textarea class="input" required placeholder="Enter Details" required name="details"><?php if(isset($_GET['error'])){echo $details ;}else {echo $product['details'];}?></textarea>
              <input name="update_product" class="button" type="submit" value="update" />
            </form>
        </div>
      </div>
    </div>


<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>