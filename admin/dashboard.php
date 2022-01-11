<?php
	ob_start();
	session_start();
	$pageTitle = 'Dashboard';
  $valid="true";

	include 'init.php';
	$headerTitle = 'Dashboard';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
	}
?>
<div class="stats" id="stats">
      <h2>Our Stats in Website</h2>
      <div class="container">
        <div class="box">
          <span class="number"><?php echo $doctorCount?></span>
          <a href="<?php if($doctorCount > 0) echo $cont."Controller.php?do=adminShowDoctors" ?>"><span class="text">Doctors</span></a>
        </div>
        <div class="box">
          <span class="number"><?php echo $trainerCount?></span>
          <a href="<?php if($trainerCount > 0) echo $cont."Controller.php?do=adminShowTrainers" ?>"><span class="text">Trainers</span></a>
        </div>
        <div class="box">
          <span class="number" ><?php echo $userCount?></span>
          <a href="<?php if($userCount > 0) echo $cont."Controller.php?do=adminShowUsers" ?>"><span class="text">Users</span></a>
        </div>
        <div class="box">
          <span class="number"><?php echo $productCount?></span>
          <a href="<?php if($productCount > 0) echo $cont."Controller.php?do=adminShowProducts" ?>"><span class="text">Products</span></a>
        </div>
        <div class="box">
          <span class="number"><?php echo $orderCount?></span>
          <a href="<?php if($orderCount > 0) echo $cont."Controller.php?do=adminShowOrders" ?>"><span class="text">Orders</span></a>
        </div>
      </div>
    </div>
    
<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>