<?php
	ob_start();
	session_start();
  $valid = "true";
	$pageTitle = 'Change Password';
	include 'init.php';
	$headerTitle = 'Change Password';
	include $inc.'header.php';
	if(isset($_GET['errors'])) {
		$errors = json_decode($_GET['errors'],JSON_OBJECT_AS_ARRAY);
	}
?>
<div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Change Password</h2>
            <ol>
            <?php 
            if(isset($errors))
            {
              foreach($errors as $e){
                  echo "<li style='list-style-type:type; text-align:left;color:red'>".$e."</li>";
              }
            }    
            ?>
            </ol>
            <form name="changepass" method="POST" action="<?php echo $cont."Controller.php?do=UserchangePass" ?>">
                <div>
		            		<label class="label" for="password">Password :</label>
                    <input type="password" title="enter strong password" class="input" name="password" id="password" placeholder="Enter Password" required="required" />
                </div>
                <div>
		            		<label class="label" for="confirm_passowrd">Confirm Password :</label>
                    <input type="password" title="enter confirm password"  class="input" name="confirm_passowrd" id="co_password" placeholder="Enter password again" required="required" />
                </div>
              <input class="button" name="change_password" type="submit" value="Save Changes" />
            </form>
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>