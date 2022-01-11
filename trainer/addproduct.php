<?php
	ob_start();
	session_start();
	$pageTitle = 'Add Product';
  $valid="true";
	include 'init.php';
	$headerTitle = 'Add Product';
	include $inc.'header.php';
	if(isset($_GET['error']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		$errors = json_decode($_GET['error'],JSON_OBJECT_AS_ARRAY);
		extract($data);
	}

?>
   <div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Add Product</h2>
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
            <form name="addProduct" method="POST" action="<?php echo $cont."Controller.php?do=storeProduct"?>" enctype="multipart/form-data">
              <input class="input" type="text" required placeholder="Enter Job Title" required name="category" value="<?php if(isset($_GET['error'])){echo $category ;}?>"/>
              <input class="input" type="text" required placeholder="Enter job estimation" required name="name" value="<?php if(isset($_GET['error'])){echo $name ;}?>"/>
              <input class="input" type="text" required placeholder="Enter job estimation" required name="price" value="<?php if(isset($_GET['error'])){echo $price ;}?>"/>
              <input type="file" name="photo" id="photo" accept="image/jpg,image/jpeg,image/png" required/>
              <textarea class="input" required placeholder="Enter Details" required name="details"><?php if(isset($_GET['error'])){echo $details ;}?></textarea>
              <input name="add_product" class="button" type="submit" value="add" />
            </form>
        </div>
      </div>
    </div>


<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>