<?php
	ob_start();
	session_start();
	$pageTitle = 'User login';
	include 'init.php';
	$headerTitle = 'User Login';
	include $inc.'header.php';
?>
<div class="login-register" id="login">
	<div class="form">
		<div class="content">
			<h2>User Login</h2>
			<form action="<?php echo $cont."Controller.php?do=userLogin" ?>" method="POST">
				<input class="input" type="email" placeholder="Your Email" name="email" />
				<input class="input" type="password" placeholder="Your Password" name="password" />
				<span>If you don't have account <a href="<?php echo $cont."Controller.php?do=showuserRegister"  ?>">Register Now</a></span>
				<input class="button" type="submit" name="login" value="login" />
			</form>
		</div>
	</div>
</div>
<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>