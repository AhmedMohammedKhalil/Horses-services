<?php
	ob_start();
	session_start();
	$pageTitle = 'Trainer Profile';
	$valid="true";

	include 'init.php';
	$headerTitle = 'Trainer Profile';
	include $inc.'header.php';
?>
<div class="component-details" >
      <div class="details">
	  	<?php if($_SESSION['trainer']['photo']  == null) {?>
			<img src="<?php echo $imgs.'horse-trainer.png'?>" alt="trainer Photo" >
		<?php }else{ ?>
			<img src="<?php echo $files.'trainers/'.$_SESSION['trainer']['id'].'/'.$_SESSION['trainer']['photo'] ?>" alt="trainer photo">
		<?php }?>
			 <div class="content">
              <h2><?php echo $_SESSION['trainer']['name'] ?></h2>
              <h2><?php echo $_SESSION['trainer']['email'] ?></h2>
			  <h2><?php echo $_SESSION['trainer']['specialization'] ?></h2>
              <h2><?php echo $_SESSION['trainer']['phone'] ?></h2>
              <p><?php echo nl2br($_SESSION['trainer']['description']) ?></p>
              <p><?php echo nl2br($_SESSION['trainer']['address']) ?></p>
              <div style="display: flex; justify-content:center">
                <a href='<?php echo $cont."Controller.php?do=showTrainerSettings" ?>' style="margin:15px">Edit</a>
                <a href='<?php echo $cont."Controller.php?do=showTrainerChangePassword" ?>' style="margin:15px">Change Password</a>
              </div>
          </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>