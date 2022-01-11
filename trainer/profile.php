<?php
	ob_start();
	session_start();
	$pageTitle = 'Trainer Profile';
	include 'init.php';
	$headerTitle = 'Trainer Profile';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
		$trainer=$trainer[0];
	}
?>
<div class="component-details" >
      <div class="details">
	  <?php if($_SESSION['trainer']['photo']  == null) {?>
			<img src="<?php echo $uploads.'trainers/default.png'?>" alt="" >
		<?php }else{ ?>
			<img src="<?php echo $files.'trainers/'.$_SESSION['trainer']['id'].'/'.$_SESSION['trainer']['photo'] ?>" alt="">
		<?php }?>
			 <div class="content">
              <h2><?php echo $trainer['name'] ?></h2>
              <h2><?php echo $trainer['email'] ?></h2>
			  <h2><?php echo $trainer['specialization'] ?></h2>
              <h2><?php echo $trainer['phone'] ?></h2>
              <p><?php echo $trainer['description'] ?></p>
              <p><?php echo $trainer['address'] ?></p>
              <div style="display: flex">
                <a href='<?php echo $cont."Controller.php?do=showTrainerSettings" ?>' style="margin-right: 10px;">Edit</a>
                <a href='<?php echo $cont."Controller.php?do=showTrainerChangePassword" ?>'>Change Password</a>
              </div>
          </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>