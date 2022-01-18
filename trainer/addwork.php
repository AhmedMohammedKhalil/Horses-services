<?php
	ob_start();
	session_start();
	$pageTitle = 'Add Work';
  $valid="true";

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
		      		<label class="label" for="job_title">Job Title :</label>
              <input class="input" title="Enter job Title" type="text" required placeholder="Enter Job Title" id="job_title" name="job_title" value="<?php if(isset($_GET['error'])){echo $job_title ;}?>"/>

		      		<label class="label" for="placement">Placement :</label>
              <input class="input" title="Enter Placement"  type="text" required placeholder="Enter placement" id="placement" name="placement" value="<?php if(isset($_GET['error'])){echo $placement ;}?>"/>
		      	
              <label class="label" for="job_estimation">Job Estimation :</label>
              <input class="input" title="Enter job estimation" type="text" required placeholder="Enter job estimation" id="job_estimation" name="job_estimation" value="<?php if(isset($_GET['error'])){echo $job_estimation ;}?>"/>
              
              <label class="label" for="details">Details :</label>
              <textarea class="input" title="Enter details" id="details" required placeholder="Enter Details" id="details" name="details"><?php if(isset($_GET['error'])){echo $details ;}?></textarea>
            
              <input name="add_work" class="button" type="submit" value="add" />
            </form>
        </div>
      </div>
    </div>


<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>