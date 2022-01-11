<?php

	ob_start();
    session_start();

	$pageTitle = 'Admin login';
	include 'init.php';
	$headerTitle = 'Admin Login';
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
				<h2>Admin Login</h2>
				<form action="<?php echo $cont."Controller.php?do=adminLogin" ?>" method="POST">
				<input class="input" type="email" placeholder="Your Email" name="email" />
				<?php if(isset($_GET['error']) && isset($email_error) && !empty($email_error))
				{
						echo "<span style='color:red'>".ucwords($email_error) ."</span>";
				} 
				?>
				<input class="input" type="password" placeholder="Your Password" name="password" />
				<?php if(isset($_GET['error'])&& isset($password_error) && !empty($password_error))
				{
						echo "<span style='color:red'>{$password_error}</span>";
				} 
				?>
				<input class="button" type="submit"  name="login" value="login" />
            </form>
			</div>
        </div>
    </div>
<?php
	include $inc . 'footer.php'; 
	ob_end_flush();

?>