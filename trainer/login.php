<?php
	ob_start();
    session_start();

	$pageTitle = 'Trainer login';
	include 'init.php';
	$headerTitle = 'trainer Login';
    include $inc.'header.php';
?>
<div class="login-register" id="login">
    <div class="form">
        <div class="content">
            <h2>Trainer Login</h2>
            <form action="">
              <input class="input" type="email" placeholder="Your Email" name="email" />
              <input class="input" type="password" placeholder="Your Password" name="password" />
              <span>If you don't have account <a href="<?php echo $cont."Controller.php?do=showtrainerRegister"  ?>">Register Now</a></span>
              <input class="button" type="submit" value="login" />
            </form>
        </div>
	</div>
</div>
<?php
	include $inc . 'footer.php'; 
	ob_end_flush();

?>