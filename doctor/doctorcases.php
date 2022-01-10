<?php
	ob_start();
	session_start();
	$pageTitle = 'Doctor Cases';
	include 'init.php';
	$headerTitle = 'Doctor Cases';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
	}
?>
   <div class="boxes" id="cases">
      <h2 class="title">Cases</h2>
      <div class="container">
        <div class="info">
        <div  style="display: flex;">
              <a class="box_a" href="<?php echo $cont."Controller.php?do=addCase" ?>">Add Case</a>         
        </div>
        <?php foreach($cases as $c)  { ?>
            <div class="box">
              <img src="<?php echo $imgs?>doctor-image-1.jpg" alt="" />
              <div class="text">
                <h3><?php echo $c['title'] ?></h3>
                <p>
                <?php echo $c['details'] ?> 
                </p>
                <p>
                <?php echo $c['treatment'] ?> 
                </p>
                <div style="display: flex;">
                  <?php   echo '<a href="'.$cont.'Controller.php?do=editCase&id='.$c['id'].'">Edit</a>' ?>
                  <?php   echo '<a href="'.$cont.'Controller.php?do=deleteCase&id='.$c['id'].'">Delete</a>' ?>
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