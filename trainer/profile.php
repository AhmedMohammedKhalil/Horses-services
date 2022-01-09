<?php
	ob_start();
	session_start();
	$pageTitle = 'User Profile';
	include 'init.php';
	$headerTitle = 'User Profile';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
		$user=$user[0];
	}
?>
<div class="component-details" >
      <div class="details">
	  <?php if($_SESSION['user']['photo']  == null) {?>
			<img src="<?php echo $uploads.'users/default.png'?>" alt="" >
		<?php }else{ ?>
			<img src="<?php echo $files.'users/'.$_SESSION['user']['id'].'/'.$_SESSION['user']['photo'] ?>" alt="">
		<?php }?>
          <div class="content">
              <h2><?php echo $user['name'] ?></h2>
              <h2><?php echo $user['email'] ?></h2>
              <div style="display: flex">
                <a href='<?php echo $cont."Controller.php?do=showUserSettings" ?>' style="margin-right: 10px;">Edit</a>
                <a href='<?php echo $cont."Controller.php?do=showUserChangePassword" ?>'>Change Password</a>
              </div>
          </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>