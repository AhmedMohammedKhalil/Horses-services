<?php
  	ob_start();
    session_start();

	$pageTitle = 'Trainer Register';
	include 'init.php';
  include $inc."header.php";
?>
    <div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Trainer Register</h2>
            <form action="">
              <input class="input" type="text" placeholder="Your Name" name="name" />
              <input class="input" type="email" placeholder="Your Email" name="email" />
              <input class="input" type="text" placeholder="Your Specialization" name="specialization" />
              <input class="input" type="text" placeholder="Your Phone" name="mobile" />
              <input class="input" type="password" placeholder="Your Password" name="password" />
              <input class="input" type="password" placeholder="Your Password again" name="confirm-password" />
              <textarea class="input" placeholder="Your Address" name="address"></textarea>
              <textarea class="input" placeholder="Tell Us About You" name="description"></textarea>
              <span>If you have account <a href="<?php  echo $cont."Controller.php?do=showtrainerLogin" ?>">Login Now</a></span>
              <input class="button" type="submit" value="Register" />
            </form>
        </div>
      </div>
    </div>
<?php
	include $inc . 'footer.php'; 
  ob_end_flush();

?>