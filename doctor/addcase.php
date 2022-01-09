<?php
	ob_start();
	session_start();
	$pageTitle = 'Add Case';
	include 'init.php';
	$headerTitle = 'Add Case';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
	}
?>
   <div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Add Cases</h2>
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
            <form name="addCase" method="POST" action="<?php echo $cont."Controller.php?do=storeCase"?>">
              <input class="input" type="text" placeholder="Enter Title" name="title" value="<?php if(isset($_GET['error'])){echo $title ;}?>"/>
              <textarea class="input" placeholder="Enter Details" name="details"><?php if(isset($_GET['error'])){echo $details ;}?></textarea>
              <textarea class="input" placeholder="Enter Treatment" name="treatment"><?php if(isset($_GET['error'])){echo $treament ;}?></textarea>
              <input name="add_case" class="button" type="submit" value="add" />
            </form>
        </div>
      </div>
    </div>


<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>