<?php
	ob_start();
	session_start();
	$pageTitle = 'Add Work';
	include 'init.php';
	$headerTitle = 'Add Work';
	include $inc.'header.php';
	if(isset($_GET['error']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		$errors = json_decode($_GET['error'],JSON_OBJECT_AS_ARRAY);
		extract($data);
	}

?>
   <div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Add Work</h2>
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
            <form name="addWork" method="POST" action="<?php echo $cont."Controller.php?do=storeWork"?>">
              <input class="input" type="text" required placeholder="Enter Job Title" name="job_title" value="<?php if(isset($_GET['error'])){echo $job_title ;}?>"/>
              <input class="input" type="text" required placeholder="Enter placement" name="placement" value="<?php if(isset($_GET['error'])){echo $placement ;}?>"/>
              <input class="input" type="text" required placeholder="Enter job estimation" name="job_estimation" value="<?php if(isset($_GET['error'])){echo $job_estimation ;}?>"/>
              <textarea class="input" required placeholder="Enter Details" name="details"><?php if(isset($_GET['error'])){echo $details ;}?></textarea>
              <input name="add_work" class="button" type="submit" value="add" />
            </form>
        </div>
      </div>
    </div>


<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>