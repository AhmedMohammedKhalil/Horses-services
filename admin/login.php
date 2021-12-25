<?php

	ob_start();
    session_start();

	$pageTitle = 'Admin login';
	include 'init.php';
	$headerTitle = 'Admin Login';
    include $inc.'header.php';
?>
	<div class="login-register" id="login">
        <div class="form">
			<div class="content">
				<h2>Admin Login</h2>
				<form action="">
					<input class="input" type="email" placeholder="Your Email" name="email" />
					<input class="input" type="password" placeholder="Your Password" name="password" />
					<input class="button" type="submit" value="login" />
				</form>
			</div>
        </div>
    </div>
<?php
	include $inc . 'footer.php'; 
	ob_end_flush();

?>