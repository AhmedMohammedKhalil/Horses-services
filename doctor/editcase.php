<?php
	ob_start();
	session_start();
	$pageTitle = 'Edit Case';
  $valid="true";

	include 'init.php';
	$headerTitle = 'Edit Case';
	include $inc.'header.php';
	if(isset($_GET['case']))
	{
		$case = json_decode($_GET['case'],JSON_OBJECT_AS_ARRAY);
	}
  if(isset($_GET['error']))
	{
		$errors = json_decode($_GET['error'],JSON_OBJECT_AS_ARRAY);
    $data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
    extract($data);
	}
?>
   <div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Edit Cases</h2>
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
            <form method="POST" action="<?php echo $cont."Controller.php?do=updateCase"?>">
              <input type="hidden" name="case_id" value="<?php echo $case['id'];?>">
              <label for="title">Title :</label>
              <input class="input" type="text" placeholder="Enter Title" id="title" name="title" value="<?php if(isset($_GET['error'])){echo $title ;} else{ echo $case['title'];}?>"/>
              <label for="details">Details :</label>
              <textarea class="input" placeholder="Enter Details" id="details" name="details"><?php if(isset($_GET['error'])){echo $details ;}else{ echo $case['details'];}?></textarea>
              <label for="treatment">Treatment :</label>
              <textarea class="input" placeholder="Enter Treatment" id="treatment" name="treatment"><?php if(isset($_GET['error'])){echo $treatment ;}else{ echo $case['treatment'];}?></textarea>
              <input name="edit_case" class="button" type="submit" value="edit" />
            </form>
        </div>
      </div>
    </div>


<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>