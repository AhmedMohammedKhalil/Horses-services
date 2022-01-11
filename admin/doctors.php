<?php
	ob_start();
	session_start();
	$pageTitle = 'All Doctors';
  $valid="true";

	include 'init.php';
	$headerTitle = 'All Doctors';
	include $inc.'header.php';
	if(isset($_GET['doctors']))
	{
		$doctors = json_decode($_GET['doctors'],JSON_OBJECT_AS_ARRAY);
	}
?>
<div style="min-height: calc(100vh - 193.4px);">
      <h1 style="text-align: center;margin:0;padding:30px">All Doctors</h1>

      <table id="lists">
        <tr>
          <th>Doctor name</th>
          <th>Email</th>
          <th>Specializtion</th>
          <th>Control</th>
        </tr>
        <?php foreach($doctors as $doctor) {?>
            <tr>
                <td><?php echo $doctor['name']?></td>
                <td><?php echo $doctor['email']?></td>
                <td><?php echo $doctor['specialization']?></td>
                <td style="display:flex;justify-content:center">
                    <a style="margin-right: 5px;" href="<?php echo $cont.'Controller.php?do=showDoctor&id='.$doctor['id'] ?>">show</a>
                </td>
            </tr>
        <?php }?>
      </table>
    </div>
    
<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>