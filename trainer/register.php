<?php
  	ob_start();
    session_start();

	$pageTitle = 'Trainer Register';
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
            <h2>Trainer Register</h2>
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
      
            <form action="<?php echo $cont."Controller.php?do=trainerRegister" ?>" method="POST">
		          	<label class="label" for="name">Name :</label>
                <input id="name" class="input" type="text" placeholder="Your Name" title="Enter Your Name" id="name" name="name" required value="<?php if(isset($_GET['error'])){echo $name ;}?>" />
	          		<label class="label" for="email">Email :</label>
                <input class="input" type="email" id="email" placeholder="Your Email" title="Enter Your Email" name="email" required value="<?php if(isset($_GET['error'])){echo $email ;}?>" />
		          	<label class="label" for="specialization">Specialization :</label>
                <input class="input" type="text" placeholder="Your Specialization" title="Enter Your Specialization" required id="specialization" name="specialization" value="<?php if(isset($_GET['error'])){echo $specialization ;}?>" />
	          		<label class="label" for="phone">Phone :</label>
                <input class="input" type="text" placeholder="Your Phone" id="phone" name="phone" title="Enter Phone " required value="<?php if(isset($_GET['error'])){echo $phone ;}?>" />
	          		<label class="label" for="password">Password :</label>              
                <input class="input" type="password" placeholder="Your Password" title="Enter Password" required id="password" name="password" />
		          	<label class="label" for="password">Confirm Password :</label>      
                <input class="input" type="password" placeholder="Your Password again" title="Confirm Password" required id="confirm_password" name="confirm_password" />
		          	<label class="label" for="password">Address :</label>              
                <textarea class="input" placeholder="Your Address" required id="address" name="address" title="Enter Your Address"><?php if(isset($_GET['error'])){echo $address ;}?></textarea>
		          	<label class="label" for="password">Description :</label> 
                <textarea class="input" placeholder="Tell Us About You" required id="description" name="description" title="Enter Your Description"><?php if(isset($_GET['error'])){echo $description ;}?></textarea>
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
  ob_end_flush();

?>