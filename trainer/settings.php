<?php
	ob_start();
	session_start();
	$pageTitle = 'User Settings';
	include 'init.php';
	$headerTitle = 'User Settings';
	include $inc.'header.php';
	if(isset($_GET['errors'])) {
		$errors = json_decode($_GET['errors'],JSON_OBJECT_AS_ARRAY);
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
	}
?>
<div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Settings</h2>
            <?php if(isset($errors)) {
										echo '<ul style="width:50%;margin:0 auto">';
										foreach($errors as $er) {
											echo "<li style='color:red;text-align:left'>$er</li>";
										}
										echo '</ul>';
						}?>
            <form name="user_edit" method="POST" action="<?php echo $cont."Controller.php?do=editUser" ?>" enctype="multipart/form-data">
            <input class="input" type="text" placeholder="Your Name" name="name" require  value="<?php if(isset($errors)) {echo $data['name']; } else { echo $_SESSION['username'];}?>"/>
              <input class="input" type="email" placeholder="Your Email" name="email" value="<?php if(isset($errors)) {echo $data['email']; } else { echo $_SESSION['user']['email'];}?>" />
              <?php if(isset($_GET['error']) && isset($email_error))
              {
                  echo "<span style='color:red'>".ucwords($email_error) ."</span>";
              } 
              ?>
                <input type="file" name="photo" id="photo" required="required" accept="image/jpg,image/jpeg,image/png"/>
              <input class="button" name="userEdit" type="submit" value="Save Changes" />
            </form>
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>