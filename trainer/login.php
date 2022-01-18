<?php
	ob_start();
    session_start();

	$pageTitle = 'Trainer login';
	include 'init.php';
	$headerTitle = 'trainer Login';
    include $inc.'header.php';
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
<div class="login-register" id="login">
    <div class="form">
        <div class="content">
            <h2>Trainer Login</h2>
            <form action="<?php echo $cont."Controller.php?do=trainerLogin" ?>" method="POST">
			<label class="label" for="email">Email :</label>

				<input class="input" title="Enter Email" type="email" id="email" placeholder="Your Email" name="email" value="<?php if(isset($_GET['error'])){echo $email ;}?>" />
				<?php if(isset($_GET['error']) && isset($email_error) && !empty($email_error))
				{
						echo "<span style='color:red'>".ucwords($email_error) ."</span>";
				} 
				?>
				<label class="label" for="password">Password :</label>

				<input class="input" id="password" title="Enter Password" type="password" placeholder="Your Password" name="password" />
				<?php if(isset($_GET['error'])&& isset($password_error) && !empty($password_error))
				{
						echo "<span style='color:red'>{$password_error}</span>";
				} 
				?>
				<label class="label" for="captcha">Enter Words in Picture</label>
				<div style="display: flex;margin-bottom:20px;justify-content:space-between">
					<input class="input" type="text" name="captcha" id="captcha" required title="Enter Captcha" placeholder="Enter captcha"  style="flex:1 ;margin:0 10px 0 0">
					<img src="<?php echo $inc.'captcha.php'?>" alt="captcha image">
				</div>
				<?php if(isset($_GET['error'])&& isset($captcha_error) && !empty($captcha_error))
				{
						echo "<span style='color:red'>{$captcha_error}</span>";
				} 
				?>
				<span>If you don't have account <a href="<?php echo $cont."Controller.php?do=showtrainerRegister"  ?>">Register Now</a></span>
				<input class="button" type="submit"  name="login" value="login" />
            </form>
        </div>
	</div>
</div>
<?php
	include $inc . 'footer.php'; 
	ob_end_flush();

?>