<?php
	ob_start();
	session_start();
	$pageTitle = 'Edit Work';
  $valid="true";

	include 'init.php';
	$headerTitle = 'Edit Work';
	include $inc.'header.php';
	if(isset($_GET['work']))
	{
		$work = json_decode($_GET['work'],JSON_OBJECT_AS_ARRAY);
	}
  if(isset($_GET['error']))
	{
		$errors = json_decode($_GET['error'],JSON_OBJECT_AS_ARRAY);
	}
?>
   <div class="login-register" id="register">
      <div class="form">
        <div class="content">
            <h2>Edit Work</h2>
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
            <form method="POST" action="<?php echo $cont."Controller.php?do=updateWork"?>">
              <input type="hidden" name="work_id" value="<?php echo $work['id'];?>">
             
              <label class="label" for="name">Job Title :</label>
              <input class="input" type="text" placeholder="Enter job_title" title="Enter job title" id="job_title" name="job_title" value="<?php if(isset($_GET['error'])){echo $job_title ;} else{ echo $work['job_title'];}?>"/>
              <label class="label" for="name">Placement :</label>
              <input class="input" type="text" placeholder="Enter placement" title="Enter placement" id="placement" name="placement" value="<?php if(isset($_GET['error'])){echo $placement ;} else{ echo $work['placement'];}?>"/>
              <label class="label" for="name">Job estimation :</label>
              <input class="input" type="text" placeholder="Enter job estimation" title="Enter job estimation" id="job_estimation" name="job_estimation" value="<?php if(isset($_GET['error'])){echo $job_estimation ;} else{ echo $work['job_estimation'];}?>"/>
              <label class="label" for="name">Details :</label>
              <textarea class="input" placeholder="Enter Details" title="Enter Details" title="Enter Details" id="details" name="details"><?php if(isset($_GET['error'])){echo $details ;}else{ echo $work['details'];}?></textarea>
              <input name="edit_work" class="button" type="submit" value="edit" />
            </form>
        </div>
      </div>
    </div>


<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>