<?php

	$pageTitle = 'User Register';
	include 'init.php';
?>
<!-- Start login-register -->
<div class="login-register" id="login-register">
      <div class="form">
        <div class="content">
          <h2>User Register</h2>
          <form action="">
            <input class="input" type="text" placeholder="Your Name" name="name" />
            <input class="input" type="email" placeholder="Your Email" name="email" />
            <input class="input" type="password" placeholder="Your Password" name="password" />
            <input class="input" type="password" placeholder="Your Password again" name="confirm-password" />
            <input type="submit" value="Register" />
          </form>
        </div>
      </div>
    </div>
    <!-- End login-register -->
<?php
	include $tpl . 'footer.php'; 
?>