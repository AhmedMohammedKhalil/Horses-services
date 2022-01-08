<?php
	ob_start();
	session_start();
	$pageTitle = 'Admin Profile';
	include 'init.php';
	$headerTitle = 'Admin Profile';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
		$admin=$admin[0];
	}
?>
<div class="component-details" >
      <div class="details">
          <div class="content">
              <h2><?php echo $admin['name'] ?></h2>
              <h2><?php echo $admin['email'] ?></h2>
              <div style="display: flex">
                <a href='<?php echo $cont."Controller.php?do=showAdminSettings" ?>' style="margin-right: 10px;">Edit</a>
                <a href='<?php echo $cont."Controller.php?do=showAdminChangePassword" ?>'>Change Password</a>
              </div>
          </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>