<?php
	ob_start();
	session_start();
	$pageTitle = 'Doctor Settings';
  $valid="true";

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
            <ol>
            <?php 
            if(isset($errors))
            {
              foreach($errors as $e){
                  echo "<li style='list-style-type:type; text-align:left;color:red'>".$e."</li>";
              }
            }    
            ?>
            </ol>
            <form name="doctor_edit" method="POST" action="<?php echo $cont."Controller.php?do=editDoctor" ?>" enctype="multipart/form-data">
              <label for="name">Name :</label>
              <input class="input" type="text" title="Your Name" placeholder="Your Name" id="name" name="name" require  value="<?php if(isset($errors)) {echo $data['name']; } else { echo $_SESSION['username'];}?>"/>
              <label for="email">Email :</label>
              <input class="input" type="email" title="Your Email" placeholder="Your Email" id="email" name="email" value="<?php if(isset($errors)) {echo $data['email']; } else { echo $_SESSION['doctor']['email'];}?>" />
              <label for="specialization">Specialization :</label>
              <input class="input" type="text" title="Your Specialization" placeholder="Your Specialization" id="specialization" name="specialization" value="<?php if(isset($errors)) {echo $data['specialization']; } else { echo $_SESSION['doctor']['specialization'];}?>"/>
              <label for="phone">Phone :</label>
              <input class="input" type="text" title="Your Phone" placeholder="Your Phone" id="phone" name="phone" value="<?php if(isset($errors)) {echo $data['phone']; } else { echo $_SESSION['doctor']['phone'];}?>" />
              <label for="photo">Photo :</label>
              <input type="file" name="photo" id="photo" title="upload photo for you" accept="image/jpg,image/jpeg,image/png"/>
              <label for="address">Address :</label>
              <textarea class="input" title="Your Address" placeholder="Your Address" id="address" name="address"><?php if(isset($errors)) {echo $data['address']; } else { echo $_SESSION['doctor']['address'];}?></textarea>
              <label for="description">Description :</label>             
              <textarea class="input" title="Tell Us About You" placeholder="Tell Us About You" id="description" name="description"><?php if(isset($errors)) {echo $data['description']; } else { echo $_SESSION['doctor']['description'];}?></textarea>
              <input class="button" name="doctorEdit" type="submit" value="Save Changes" />
            </form>
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>