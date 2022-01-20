<?php
	ob_start();
	session_start();
	$pageTitle = 'All Products';
  $valid="true";

	include 'init.php';
	$headerTitle = 'All Products';
	include $inc.'header.php';
	if(isset($_GET['products']))
	{
		$products = json_decode($_GET['products'],JSON_OBJECT_AS_ARRAY);
	}else {
    header("location: {$app}");
  }
?>
<div style="min-height: calc(100vh - 193.4px);">
      <h1 style="text-align: center;margin:0;padding:30px">All Products</h1>

      <table id="lists">
        <tr>
          <th>Product name</th>
          <th>Trainer Name</th>
          <th>Price</th>
          <th>Control</th>
        </tr>
        <?php foreach($products as $product) {?>
            <tr>
                <td><?php echo $product['p_name']?></td>
                <td><a href="<?php echo $cont.'Controller.php?do=showTrainer&id='.$product['t_id'] ?>"><?php echo $product['t_name']?></a></td>
                <td><?php echo $product['price']?></td>
                <td style="display:flex;justify-content:center">
                    <a style="margin-right: 5px;" href="<?php echo $cont.'Controller.php?do=showProduct&id='.$product['p_id'] ?>">show</a>
                </td>
            </tr>
        <?php }?>
      </table>
    </div>
    
<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>