<?php
	ob_start();
	session_start();
	$pageTitle = 'Admin Settings';
	$valid="true";

	include 'init.php';
	$headerTitle = 'Admin Settings';
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
            <form name="admin_edit" method="POST" action="<?php echo $cont."Controller.php?do=editAdmin" ?>">
			<label class="label" for="name">Name :</label>
            <input class="input" type="text" placeholder="Your Name" id="name" title="Enter Name" name="name" require  value="<?php if(isset($errors)) {echo $data['name']; } else { echo $_SESSION['username'];}?>"/>
			<label class="label" for="email">Email :</label>
            <input class="input" type="email" placeholder="Your Email" id="email" title="Enter Email" name="email" value="<?php if(isset($errors)) {echo $data['email']; } else { echo $_SESSION['admin']['email'];}?>" />
              <?php if(isset($_GET['error']) && isset($email_error))
              {
                  echo "<span style='color:red'>".ucwords($email_error) ."</span>";
              } 
              ?>
              <input class="button" name="adminEdit" type="submit" value="Save Changes" />
            </form>
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>