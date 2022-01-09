<?php
	ob_start();
	session_start();
	$pageTitle = 'Doctor Profile';
	include 'init.php';
	$headerTitle = 'Doctor Profile';
	include $inc.'header.php';
	if(isset($_GET['data']))
	{
		$data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
		extract($data);
		$doctor=$doctor[0];
	}
?>
<div class="component-details" >
      <div class="details">
	  <?php if($_SESSION['doctor']['photo']  == null) {?>
			<img src="<?php echo $uploads.'doctors/default.png'?>" alt="" >
		<?php }else{ ?>
			<img src="<?php echo $files.'doctors/'.$_SESSION['doctor']['id'].'/'.$_SESSION['doctor']['photo'] ?>" alt="">
		<?php }?>
          <div class="content">
              <h2><?php echo $doctor['name'] ?></h2>
              <h2><?php echo $doctor['email'] ?></h2>
			  <h2><?php echo $doctor['specialization'] ?></h2>
              <h2><?php echo $doctor['phone'] ?></h2>
              <p><?php echo $doctor['description'] ?></p>
              <p><?php echo $doctor['address'] ?></p>
              <div style="display: flex">
                <a href='<?php echo $cont."Controller.php?do=showDoctorSettings" ?>' style="margin-right: 10px;">Edit</a>
                <a href='<?php echo $cont."Controller.php?do=showDoctorChangePassword" ?>'>Change Password</a>
              </div>
          </div>
      </div>
    </div>

<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>