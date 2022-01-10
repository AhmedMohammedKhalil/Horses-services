<?php
	ob_start();
  session_start();
	$pageTitle = 'User Register';
	include 'init.php';
  include $inc."header.php";

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
                      echo "<li style='list-style-type:type; text-align:left;color:red'>".$e."</li>";
                  }
                }    
              ?>
            </ol>
            <form action="<?php echo $cont."Controller.php?do=userRegister" ?>" method="POST">
              <input class="input" type="text" placeholder="Your Name" name="name" required value="<?php if(isset($_GET['error'])){echo $name ;}?>"/>
              <input class="input" type="email" placeholder="Your Email" name="email"  value="<?php if(isset($_GET['error'])){echo $email ;}?>" />
              <input class="input" type="text" placeholder="Your phone" name="phone" value="<?php if(isset($_GET['error'])){echo $phone ;}?>"/>
              <textarea class="input" type="text" placeholder="Your address" name="address" ><?php if(isset($_GET['error'])){echo $address ;}?></textarea>
              <input class="input" type="password" placeholder="Your Password" name="password" />
              <input class="input" type="password" placeholder="Your Password again" name="confirm_password" />
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