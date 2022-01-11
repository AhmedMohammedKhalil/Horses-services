<?php
	ob_start();
	session_start();
	$pageTitle = 'All Users';
	include 'init.php';
	$headerTitle = 'All Users';
	include $inc.'header.php';
	if(isset($_GET['users']))
	{
		$users = json_decode($_GET['users'],JSON_OBJECT_AS_ARRAY);
	}
?>
<div style="min-height: calc(100vh - 193.4px);">
      <h1 style="text-align: center;margin:0;padding:30px">All Users</h1>

      <table id="lists">
        <tr>
          <th>User name</th>
          <th>Email</th>
          <th>Phone</th>
          
        </tr>
        <?php foreach($users as $user) {?>
            <tr>
                <td><?php echo $user['name']?></td>
                <td><?php echo $user['email']?></td>
                <td><?php echo $user['phone']?></td>
            </tr>
        <?php }?>
      </table>
    </div>
    
<?php
	include $inc . 'footer.php';
	ob_end_flush();
?>