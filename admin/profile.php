<?php
	ob_start();
	session_start();
	$pageTitle = 'Admin Profile';
	$valid="true";

	include 'init.php';
	$headerTitle = 'Admin Profile';
	include $inc.'header.php';
?>
<div class="component-details" >
      <div class="details">
          <div class="content">
              <h2><?php echo $_SESSION['admin']['name'] ?></h2>
              <h2><?php echo $_SESSION['admin']['email'] ?></h2>
              <div style="display: flex;justify-content:center">
                <a href='<?php echo $cont."Controller.php?do=showAdminSettings" ?>' style="margin: 15px;">Edit</a>
                <a href='<?php echo $cont."Controller.php?do=showAdminChangePassword" ?>' style="margin: 15px;">Change Password</a>
              </div>
          </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>