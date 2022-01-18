<?php
	ob_start();
	session_start();
  $valid = "true";
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
            <ol>
              <?php 
                if(isset($errors))
                {
                  foreach($errors as $e){
                      echo "<li style='text-align:left;color:red'>".$e."</li>";
                  }
                }    
              ?>
            </ol>
            <form name="user_edit" method="POST" action="<?php echo $cont."Controller.php?do=editUser" ?>" enctype="multipart/form-data">
              <label class="label" for="name">Name :</label>
              <input class="input" title="enter name" type="text" placeholder="Your Name" name="name" id="name" required  value="<?php if(isset($errors)) {echo $data['name']; } else { echo $_SESSION['username'];}?>"/>
              <label class="label" for="email">Email :</label>
              <input class="input" title="enter email" type="email" placeholder="Your Email" name="email" id="email" required value="<?php if(isset($errors)) {echo $data['email']; } else { echo $_SESSION['user']['email'];}?>" />
              <label class="label" for="photo">Photo :</label>
              <input type="file"   title="upload photo" name="photo" id="photo" accept="image/jpg,image/jpeg,image/png"/>
              <label class="label" for="phone">Phone :</label>
              <input class="input" title="enter phone number" type="text" placeholder="Your phone" name="phone" id="phone" required  value="<?php if(isset($errors)) {echo $data['phone']; } else { echo $_SESSION['user']['phone'];}?>"/>
              <label class="label" for="address">Address :</label>
              <textarea class="input"  title="enter address"  placeholder="Your address" name="address" id="address" required><?php if(isset($errors)) {echo $data['address']; } else { echo $_SESSION['user']['address'];}?></textarea>
              <input class="button" name="userEdit" type="submit" value="Save Changes" />
            </form>
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>