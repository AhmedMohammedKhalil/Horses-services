<?php
	ob_start();
	session_start();
	$pageTitle = 'User Purchases';
	include 'init.php';
	$headerTitle = 'Purchases Login';
	include $inc.'header.php';
  $data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
    extract($data);
?>
<div style="min-height: calc(100vh - 193.4px);">
    <h1 style="text-align: center;margin:0;padding:30px">Purchases</h1>

        <table id="lists">
        <tr>
          <th>product name</th>
          <th>Trainer name</th>
          <th>price</th>
        </tr>
        <?php foreach($products as $p){ ?>
          <tr>
            <td><a href="<?php echo $cont?>Controller.php?do=showProduct&id=<?php echo $p['p_id']?>"><?php echo $p['product_name'] ?></a></td>
            <td><a href="<?php echo $cont?>Controller.php?do=showTrainer&id=<?php echo $p['t_id']?>"><?php echo $p['trainer_name'] ?></a></td>
            <td><?php echo $p['price'] ?> KD</td>
          </tr>

      <?php }?>
  
      </table>
    </div>
<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>