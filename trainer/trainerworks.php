<?php
	ob_start();
	session_start();
	$pageTitle = 'Trainer Previous Work';
	include 'init.php';
	$headerTitle = 'Trainer Previous Work';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
	}
?>
 <div class="boxes" id="previous-works">
      <h2 class="title">Previous Works</h2>
      <div class="container">
        <div class="info">
        <div  style="display: flex;">
              <a class="box_a" href="<?php echo $cont."Controller.php?do=addWork" ?>">Add Previous Works</a>         
        </div>
        <?php foreach($works as $c)  { ?>
          <div class="box">
            <img src="<?php echo $imgs?>horse-trainer-1.jpg" alt="" />
            <div class="text">
              <h3><?php echo $c['job_title'] ?></h3>
              <h4><?php echo $c['placement'] ?></h4>
              <h4><?php echo $c['job_estimation'] ?></h4>
              <p>
              <?php echo $c['details'] ?> 
              </p>
              <div style="display: flex;">
                <?php   echo '<a href="'.$cont.'Controller.php?do=editWork&id='.$c['id'].'">Edit</a>' ?>
                <?php   echo '<a href="'.$cont.'Controller.php?do=deleteWork&id='.$c['id'].'">Delete</a>' ?>
              </div>
            </div>
          </div>
        <?php }?> 
        </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>