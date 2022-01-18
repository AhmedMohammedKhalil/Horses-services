<?php
	ob_start();
	session_start();
	$valid = "true";
	$pageTitle = 'User Profile';
	include 'init.php';
	$headerTitle = 'User Profile';
	include $inc.'header.php';
?>
<div class="component-details" >
      <div class="details">
	  <?php if($_SESSION['user']['photo']  == null) {?>
			<img src="<?php echo $imgs.'user-image.jpg'?>" alt="user photo" >
		<?php }else{ ?>
			<img src="<?php echo $files.'users/'.$_SESSION['user']['id'].'/'.$_SESSION['user']['photo'] ?>" alt="user photo">
		<?php }?>
          <div class="content">
              <h2><?php echo $_SESSION['user']['name'] ?></h2>
              <h2><?php echo $_SESSION['user']['email'] ?></h2>
			  <h2><?php echo $_SESSION['user']['phone'] ?></h2>
              <p><?php echo nl2br($_SESSION['user']['address']) ?></p>

              <div style="display: flex;justify-content:center">
                <a href='<?php echo $cont."Controller.php?do=showUserSettings" ?>' style="margin: 15px;">Edit</a>
                <a href='<?php echo $cont."Controller.php?do=showUserChangePassword" ?>' style="margin: 15px;">Change Password</a>
              </div>
          </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>