<?php
	ob_start();
	session_start();
	$pageTitle = 'All Orders';
  $valid="true";

	include 'init.php';
	$headerTitle = 'All Orders';
	include $inc.'header.php';
	if(isset($_GET['orders']))
	{
		$orders = json_decode($_GET['orders'],JSON_OBJECT_AS_ARRAY);
	}else {
    header("location: {$app}");
  }
?>
<div style="min-height: calc(100vh - 193.4px);">
      <h1 style="text-align: center;margin:0;padding:30px">All Orders</h1>

      <table id="lists">
        <tr>
          <th>User Name</th>
          <th>Product name</th>
          <th>Trainer Name</th>
        </tr>
        <?php foreach($orders as $order) {?>
            <tr>
              <td><?php echo $order['u_name']?></td>
              <td><a href="<?php echo $cont.'Controller.php?do=showProduct&id='.$order['p_id'] ?>"><?php echo $order['p_name']?></a></td>
              <td><a href="<?php echo $cont.'Controller.php?do=showTrainer&id='.$order['t_id'] ?>"><?php echo $order['t_name']?></a></td>
            </tr>
        <?php }?>
      </table>
    </div>
    
<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>