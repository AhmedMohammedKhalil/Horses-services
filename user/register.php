<?php
	ob_start();
  session_start();
  
	$pageTitle = 'User Register';
	include 'init.php';
  include $inc."header.php";
  if(isset($_SESSION['username'])) {
		header("location: {$app}");
	}
  if(isset($_GET['error']))
	{
	  $errors= json_decode($_GET['error'],JSON_OBJECT_AS_ARRAY);
	  $data=json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($errors );
		extract($data );
	}
?>
<div class="login-register" id="register">
        <div class="form">
        <div class="content">
            <h2>User Register</h2>
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
            <form action="<?php echo $cont."Controller.php?do=userRegister" ?>" method="POST">
			      	<label class="label" for="name">Name :</label>
              <input class="input" type="text" placeholder="Your Name" title="enter name" name="name" required value="<?php if(isset($_GET['error'])){echo $name ;}?>"/>
			      	<label class="label" for="email">Email :</label>
              <input class="input" type="email" placeholder="Your Email" title="enter email" name="email"  value="<?php if(isset($_GET['error'])){echo $email ;}?>" />
			      	<label class="label" for="phone">Phone :</label>
              <input class="input" type="text" placeholder="Your phone" name="phone" title="enter phone" value="<?php if(isset($_GET['error'])){echo $phone ;}?>"/>
			      	<label class="label" for="address">Address :</label>
              <textarea class="input" type="text" placeholder="Your address" name="address" title="enter address" ><?php if(isset($_GET['error'])){echo $address ;}?></textarea>
			      	<label class="label" for="password">Password :</label>
              <input class="input" type="password" placeholder="Your Password" title="enter strong password" name="password" />
			      	<label class="label" for="confirm_password">Confirm Password :</label>
              <input class="input" type="password" placeholder="Your Password again" title="confirm matched password" name="confirm_password" />
              <span>If you have account <a href="<?php  echo $cont."Controller.php?do=showuserLogin" ?>">Login Now</a></span>
              <input class="button" type="submit" value="register" name="register" />
            </form>
        </div>
        </div>
    </div>
<?php
	include $inc . 'footer.php'; 
  ob_end_flush();

?>