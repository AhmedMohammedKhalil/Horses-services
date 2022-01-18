<?php
	ob_start();
	session_start();
	$pageTitle = 'Doctor Profile';
	$valid="true";

	include 'init.php';
	$headerTitle = 'Doctor Profile';
	include $inc.'header.php';
?>
<div class="component-details" >
      <div class="details">
	  <?php if($_SESSION['doctor']['photo']  == null) {?>
			<img src="<?php echo $imgs.'doctor-image.jpg'?>" alt="doctor photo" >
		<?php }else{ ?>
			<img src="<?php echo $files.'doctors/'.$_SESSION['doctor']['id'].'/'.$_SESSION['doctor']['photo'] ?>" alt="doctor photo">
		<?php }?>
          <div class="content">
              <h2><?php echo $_SESSION['doctor']['name'] ?></h2>
              <h2><?php echo $_SESSION['doctor']['email'] ?></h2>
			  <h2><?php echo $_SESSION['doctor']['specialization'] ?></h2>
              <h2><?php echo $_SESSION['doctor']['phone'] ?></h2>
              <p><?php echo nl2br($_SESSION['doctor']['description']) ?></p>
              <p><?php echo nl2br($_SESSION['doctor']['address']) ?></p>
              <div style="display: flex;justify-content:center">
                <a href='<?php echo $cont."Controller.php?do=showDoctorSettings" ?>' style="margin: 15px;">Edit</a>
                <a href='<?php echo $cont."Controller.php?do=showDoctorChangePassword" ?>' style="margin: 15px;">Change Password</a>
              </div>
          </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>