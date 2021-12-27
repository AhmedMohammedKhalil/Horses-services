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
            <form action="<?php echo $cont."Controller.php?do=userRegister" ?>" method="POST">
            <input class="input" type="text" placeholder="Your Name" name="name" require value=" <?php if(isset($_GET['error'])){echo $name ;}?> "/>
              <input class="input" type="email" placeholder="Your Email" name="email" value=" <?php if(isset($_GET['error'])){echo $email ;}?> " />
              <?php if(isset($_GET['error']) && isset($email_error))
              {
                  echo "<span style='color:red'>".ucwords($email_error) ."</span>";
              } 
              ?>
              <input class="input" type="password" placeholder="Your Password" name="password" />
              <input class="input" type="password" placeholder="Your Password again" name="confirm_password" />
              <?php if(isset($_GET['error'])&& isset($password_error))
              {
                  echo "<span style='color:red'>{$password_error}</span>";
              } 
			      	?>
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