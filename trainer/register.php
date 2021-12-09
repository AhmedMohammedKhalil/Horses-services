<?php

	$pageTitle = 'User Register';
	include 'init.php';
?>
<!-- Start login-register -->
<div class="login-register" id="login-register">
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
            <input type="submit" value="Register" />
          </form>
        </div>
      </div>
    </div>
    <!-- End login-register -->
<?php
	include $tpl . 'footer.php'; 
?>