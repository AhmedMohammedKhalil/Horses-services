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

		      		<label class="label" for="category">Category :</label>
              <input class="input" title="Enter Category" type="text" required placeholder="Enter Category" required name="category" value="<?php if(isset($_GET['error'])){echo $category ;}?>"/>

		      		<label class="label" for="name">Name :</label>
              <input class="input" title="enter name" type="text" required placeholder="Enter Name" required name="name" value="<?php if(isset($_GET['error'])){echo $name ;}?>"/>

		      		<label class="label" for="price">Price :</label>
              <input class="input" title="Enter Price" type="text" required placeholder="Enter Price" required name="price" value="<?php if(isset($_GET['error'])){echo $price ;}?>"/>

		      		<label class="label" for="photo">Photo :</label>
              <input type="file" title="upload photo" name="photo" id="photo" accept="image/jpg,image/jpeg,image/png" required/>

		      		<label class="label" for="details">Details :</label>
              <textarea class="input" title="write details" required placeholder="Enter Details" required name="details"><?php if(isset($_GET['error'])){echo $details ;}?></textarea>
              <input name="add_product" class="button" type="submit" value="add" />
            </form>
        </div>
      </div>
    </div>


<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>