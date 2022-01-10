<?php
	ob_start();
	session_start();
	$pageTitle = 'Doctor Settings';
	include 'init.php';
	$headerTitle = 'Doctor Settings';
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
            <form name="doctor_edit" method="POST" action="<?php echo $cont."Controller.php?do=editDoctor" ?>" enctype="multipart/form-data">
              <input class="input" type="text" placeholder="Your Name" name="name" require  value="<?php if(isset($errors)) {echo $data['name']; } else { echo $_SESSION['username'];}?>"/>
              <input class="input" type="email" placeholder="Your Email" name="email" value="<?php if(isset($errors)) {echo $data['email']; } else { echo $_SESSION['doctor']['email'];}?>" />
              <input class="input" type="text" placeholder="Your Specialization" name="specialization" value="<?php if(isset($errors)) {echo $data['specialization']; } else { echo $_SESSION['doctor']['specialization'];}?>"/>
              <input class="input" type="text" placeholder="Your Phone" name="phone" value="<?php if(isset($errors)) {echo $data['phone']; } else { echo $_SESSION['doctor']['phone'];}?>" />
              <input type="file" name="photo" id="photo" accept="image/jpg,image/jpeg,image/png"/>
              <textarea class="input" placeholder="Your Address" name="address"><?php if(isset($errors)) {echo $data['address']; } else { echo $_SESSION['doctor']['address'];}?></textarea>
              <textarea class="input" placeholder="Tell Us About You" name="description"><?php if(isset($errors)) {echo $data['description']; } else { echo $_SESSION['doctor']['description'];}?></textarea>
              <input class="button" name="doctorEdit" type="submit" value="Save Changes" />
            </form>
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>