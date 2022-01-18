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
              <label for="name">Name :</label>
              <input class="input" type="text" title="Your Name" placeholder="Your Name" id="name"  name="name" required value="<?php if(isset($_GET['error'])){echo $name ;}?>" />
              <label for="email">Email :</label>
              <input class="input" type="email"title="Your Email"  placeholder="Your Email" id="email" name="email" required value="<?php if(isset($_GET['error'])){echo $email ;}?>" />
              <label for="specialization">Specialization :</label>
              <input class="input" type="text" title="Your Specialization" placeholder="Your Specialization" required id="specialization"  name="specialization" value="<?php if(isset($_GET['error'])){echo $specialization ;}?>" />
              <label for="phone">Phone :</label>
              <input class="input" type="text" title="Your Phone" placeholder="Your Phone" id="phone"  name="phone" required value="<?php if(isset($_GET['error'])){echo $mobile ;}?>" />
              <label for="passeord">Password :</label>
              <input class="input" type="password" title="Your Password" placeholder="Your Password" required id="password"  name="password" />
              <label for="confirm_passeord">Confirm Password :</label>
              <input class="input" type="password"title="Your Password again"  placeholder="Your Password again" required  id="confirm_password" name="confirm_password" />
              <label for="address">Address :</label>
              <textarea class="input" title="Your Address" placeholder="Your Address" required  id="address" name="address"><?php if(isset($_GET['error'])){echo $address ;}?></textarea>
              <label for="description">Description :</label>             
              <textarea class="input" title="Tell Us About You" placeholder="Tell Us About You" required  id="description" name="description"><?php if(isset($_GET['error'])){echo $description ;}?></textarea>
              <label class="label" for="captcha">Enter Words in Picture</label>
              <div style="display: flex;margin-bottom:20px;justify-content:space-between">
                <input class="input" type="text" name="captcha" id="captcha" required title="Enter Captcha" placeholder="Enter captcha"  style="flex:1 ;margin:0 10px 0 0">
                <img src="<?php echo $inc.'captcha.php'?>" alt="captcha image">
              </div>
              <span>If you have account <a href="<?php echo $cont."Controller.php?do=showdocotorLogin"  ?>">Login Now</a></span>
              <input class="button" type="submit" name="register" value="Register" />
            </form>
        </div>
      </div>
    </div>
<?php
	include $inc . 'footer.php'; 
?>