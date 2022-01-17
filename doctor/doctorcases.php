<?php
	ob_start();
	session_start();
	$pageTitle = 'Doctor Cases';
  $valid="true";

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
      <div  style="display: flex;">
            <a class="box_a" href="<?php echo $cont."Controller.php?do=addCase" ?>">Add Case</a>         
      </div>
      <?php if($cases) {
                echo '      <h2 class="title">Cases</h2>        ';
        }else {
                echo '      <h2 class="title">Not Found Cases</h2>        ';
        }
                ?> 
      <div class="container">
        <div class="info" style="min-height:180px">
          <?php foreach($cases as $c)  { ?>
              <div class="box">
                <img src="<?php echo $imgs?>doctor-image.jpg" alt="doctor case" />
                <div class="text" style="flex: 1;">
                  <h3><?php echo $c['title'] ?></h3>
                  <p>
                  <?php echo nl2br($c['details']) ?> 
                  </p>
                  <p>
                  <?php echo nl2br($c['treatment']) ?> 
                  </p>
                  <div style="display: flex;">
                    <?php   echo '<a href="'.$cont.'Controller.php?do=editCase&id='.$c['id'].'" style="margin:15px">Edit</a>' ?>
                    <?php   echo '<a href="'.$cont.'Controller.php?do=deleteCase&id='.$c['id'].'" style="margin:15px">Delete</a>' ?>
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