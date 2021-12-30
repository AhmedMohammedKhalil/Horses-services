<?php
    ob_start();
    session_start();
    include('init.php');
    $pageTitle = "Doctor Details";
    include($inc.'header.php');
?>
    <div class="component-details" id="doctor">
      <div class="details">
        <img src="<?php echo $imgs.'doctor-image.jpg' ?>" alt="" />
        <div class="content">
            <h2>Name</h2>
            <h2>specialization</h2>
            <h2>phone</h2>
            <p>Details</p>
            <p>Address</p>
        </div>
      </div>
    </div>
    <div class="boxes" id="works">
      <h2 class="title">Cases</h2>
      <div class="container">
        <div class="info">
            <!-- foreach -->
          <div class="box">
            <img src="<?php echo $imgs.'doctor-image.jpg' ?>" alt="" />
            <div class="text">
              <h3>title</h3>
              <p>
                Details   
              </p>
              <p>
                treatmeant   
              </p>
            </div>
          </div>
            <!-- end -->
        </div>
      </div>
    </div>

<?php
    include($inc.'footer.php');
    ob_end_flush();