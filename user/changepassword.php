<?php
	ob_start();
	session_start();
	$pageTitle = 'Change Password';
	include 'init.php';
	$headerTitle = 'Change Password';
	include $inc.'header.php';
	if(isset($_GET['errors'])) {
		$errors = json_decode($_GET['errors'],JSON_OBJECT_AS_ARRAY);
	}
?>
<div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Change Password</h2>
            <?php if(isset($errors)) {
				echo '<ul style="width:50%;margin:0 auto">';
				foreach($errors as $er) {
					echo "<li style='color:red;text-align:left'>$er</li>";
				}
				echo '</ul>';
			}?>
            <form name="changepass" method="POST" action="<?php echo $cont."Controller.php?do=UserchangePass" ?>">
                <div>
                    <input type="password" class="input" name="password" id="password" placeholder="Enter Password" required="required" />
                </div>
                <div>
                    <input type="password" class="input" name="confirm_passowrd" id="co_password" placeholder="Enter password again" required="required" />
                </div>
              <input class="button" name="change_password" type="submit" value="Save Changes" />
            </form>
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>