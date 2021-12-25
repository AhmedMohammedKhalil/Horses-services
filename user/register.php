<?php
	ob_start();
  session_start();
	$pageTitle = 'User Register';
	include 'init.php';
  include $inc."header.php";
?>
<div class="login-register" id="register">
        <div class="form">
        <div class="content">
            <h2>User Register</h2>
            <form action="">
            <input class="input" type="text" placeholder="Your Name" name="name" />
              <input class="input" type="email" placeholder="Your Email" name="email" />
              <input class="input" type="password" placeholder="Your Password" name="password" />
              <input class="input" type="password" placeholder="Your Password again" name="confirm-password" />
              <span>If you have account <a href="<?php  echo $cont."Controller.php?do=showuserLogin" ?>">Login Now</a></span>
              <input class="button" type="submit" value="Register" />
            </form>
        </div>
        </div>
    </div>
<?php
	include $inc . 'footer.php'; 
  ob_end_flush();

?>