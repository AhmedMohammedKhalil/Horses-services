<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "Doctor Details";
    include($inc.'header.php');
    include_once('controllers/HomeController.php');
    $data = json_decode($_GET['data'],JSON_OBJECT_AS_ARRAY);
    extract($data);
    $doctor=$doctor[0];
?>
    <div class="component-details" id="doctor">
      <div class="details">
        <img src="<?php echo $imgs.'doctor-image.jpg' ?>" alt="" />
        <div class="content">
            <h2><?php echo $doctor['name'] ?></h2>
            <h2><?php echo $doctor['specialization'] ?></h2>
            <h2><?php echo $doctor['phone'] ?></h2>
            <p><?php echo $doctor['description'] ?></p>
            <p><?php echo $doctor['address'] ?></p>
        </div>
      </div>
    </div>
    <div class="boxes" id="works">
      <h2 class="title">Cases</h2>
      <div class="container">
        <div class="info">
          <?php foreach($cases as $c)  { ?>
          <div class="box">
            <img src="<?php echo $imgs.'doctor-image.jpg' ?>" alt="" />
            <div class="text">
              <h3><?php echo $c['title'] ?></h3>
              <p>
              <?php echo $c['details'] ?>
              </p>
              <p>
              <?php echo $c['treatment'] ?> 
              </p>
            </div>
          </div>
          <?php }?> 
        </div>
      </div>
    </div>

<?php
    include($inc.'footer.php');
    ob_end_flush();