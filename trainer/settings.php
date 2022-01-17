<?php
	ob_start();
	session_start();
	$pageTitle = 'Trainer Settings';
  $valid="true";

	include 'init.php';
	$headerTitle = 'Trainer Settings';
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
            <form name="doctor_edit" method="POST" action="<?php echo $cont."Controller.php?do=editTrainer" ?>" enctype="multipart/form-data">
              <label class="label" for="name">Name :</label>
              <input class="input" type="text" title="Enter Name" placeholder="Your Name" id="name" name="name" require  value="<?php if(isset($errors)) {echo $data['name']; } else { echo $_SESSION['username'];}?>"/>
	          	<label class="label" for="email">Email :</label>
              <input class="input" type="email" title="Enter Email" placeholder="Your Email" id="email" name="email" value="<?php if(isset($errors)) {echo $data['email']; } else { echo $_SESSION['trainer']['email'];}?>" />
              <label class="label" for="specialization">Specialization :</label>
              <input class="input" type="text"  title="Enter Specialization" placeholder="Your Specialization" id="specialization" name="specialization" value="<?php if(isset($errors)) {echo $data['specialization']; } else { echo $_SESSION['trainer']['specialization'];}?>"/>
              <label class="label" for="phone">Phone :</label> 
              <input class="input" type="text" title="Enter Phone" placeholder="Your Phone" id="phone" name="phone" value="<?php if(isset($errors)) {echo $data['phone']; } else { echo $_SESSION['trainer']['phone'];}?>" />
              <label class="label" for="photo">Photo :</label> 
              <input type="file" name="photo" title="Enter Photo" id="photo" accept="image/jpg,image/jpeg,image/png"/>
              <label class="label" for="address">Address :</label> 
              <textarea class="input" title="Enter Address" placeholder="Your Address" id="address" name="address"><?php if(isset($errors)) {echo $data['address']; } else { echo $_SESSION['trainer']['address'];}?></textarea>
              <label class="label" for="description">Description :</label> 
              <textarea class="input" title="Enter Description" placeholder="Tell Us About You" id="description" name="description"><?php if(isset($errors)) {echo $data['description']; } else { echo $_SESSION['trainer']['description'];}?></textarea>
              <input class="button" name="trainerEdit" type="submit" value="Save Changes" />
            </form>
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>