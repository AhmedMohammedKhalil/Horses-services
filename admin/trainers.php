<?php
	ob_start();
	session_start();
	$pageTitle = 'All Trainers';
	include 'init.php';
	$headerTitle = 'All Trainers';
  $valid="true";

	include $inc.'header.php';
	if(isset($_GET['trainers']))
	{
		$trainers = json_decode($_GET['trainers'],JSON_OBJECT_AS_ARRAY);
	}else {
    header("location: {$app}");
  }
?>
<div style="min-height: calc(100vh - 193.4px);">
      <h1 style="text-align: center;margin:0;padding:30px">All Trainers</h1>

      <table id="lists">
        <tr>
          <th>Trainer name</th>
          <th>Email</th>
          <th>Specializtion</th>
          <th>Control</th>
        </tr>
        <?php foreach($trainers as $trainer) {?>
            <tr>
                <td><?php echo $trainer['name']?></td>
                <td><?php echo $trainer['email']?></td>
                <td><?php echo $trainer['specialization']?></td>
                <td style="display:flex;justify-content:center">
                    <a style="margin-right: 5px;" href="<?php echo $cont.'Controller.php?do=showTrainer&id='.$trainer['id'] ?>">show</a>
                </td>
            </tr>
        <?php }?>
      </table>
    </div>
    
<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>