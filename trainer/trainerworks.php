<?php
	ob_start();
	session_start();
	$pageTitle = 'Trainer Previous Work';
  $valid="true";

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
      <div  style="display: flex;">
              <a class="box_a" href="<?php echo $cont."Controller.php?do=addWork" ?>">Add Previous Works</a>         
      </div>
      <?php if($works) {
        echo '      <h2 class="title">Previous Works</h2>        ';
      }else {
        echo '      <h2 class="title">Not Found Previous Works</h2>        ';
      }
        ?>
      <div class="container">
        <div class="info" style="min-height:180px">
        <?php foreach($works as $c)  { ?>
          <div class="box">
            <img src="<?php echo $imgs?>horse-trainer-1.jpg" alt="" />
            <div class="text" style="flex: 1;">
              <h3><?php echo $c['job_title'] ?></h3>
              <h4><?php echo $c['placement'] ?></h4>
              <h4><?php echo $c['job_estimation'] ?></h4>
              <p>
              <?php echo nl2br($c['details']) ?> 
              </p>
              <div style="display: flex;justify-content:start">
                <?php   echo '<a href="'.$cont.'Controller.php?do=editWork&id='.$c['id'].'" style="margin:15px">Edit</a>' ?>
                <?php   echo '<a href="'.$cont.'Controller.php?do=deleteWork&id='.$c['id'].'" style="margin:15px">Delete</a>' ?>
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