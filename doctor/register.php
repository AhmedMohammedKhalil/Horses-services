<?php

  ob_start();
  session_start();

$pageTitle = 'Doctor Register';
include 'init.php';
  include $inc."header.php";
  if(isset($_SESSION['username'])) {
		header("location: {$app}");
	}
  if(isset($_GET['error']))
	{
	  $errors= json_decode($_GET['error'],JSON_OBJECT_AS_ARRAY);
	  $data=json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data );
	}
?>
    <div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Doctor Register</h2>
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
      
            <form action="<?php echo $cont."Controller.php?do=doctorRegister" ?>" method="POST">
              <input class="input" type="text" placeholder="Your Name" name="name" required value="<?php if(isset($_GET['error'])){echo $name ;}?>" />
              <input class="input" type="email" placeholder="Your Email" name="email" required value="<?php if(isset($_GET['error'])){echo $email ;}?>" />
              <input class="input" type="text" placeholder="Your Specialization" required name="specialization" value="<?php if(isset($_GET['error'])){echo $specialization ;}?>" />
              <input class="input" type="text" placeholder="Your Phone" name="phone" required value="<?php if(isset($_GET['error'])){echo $mobile ;}?>" />
              <input class="input" type="password" placeholder="Your Password" required name="password" />
              <input class="input" type="password" placeholder="Your Password again" required name="confirm_password" />
              <textarea class="input" placeholder="Your Address" required name="address"><?php if(isset($_GET['error'])){echo $address ;}?></textarea>
              <textarea class="input" placeholder="Tell Us About You" required name="description"><?php if(isset($_GET['error'])){echo $description ;}?></textarea>
              <span>If you have account <a href="<?php echo $cont."Controller.php?do=showdocotorLogin"  ?>">Login Now</a></span>
              <input class="button" type="submit" name="register" value="Register" />
            </form>
        </div>
      </div>
    </div>
<?php
	include $inc . 'footer.php'; 
?>