<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	$time = time();
	$value = mysqli_real_escape_string($mysqli, $_POST['value']);
	$rowid = mysqli_real_escape_string($mysqli, $_POST['id']);
	$temp = explode("-",$rowid);
	$type = $temp[0];
	$subscriber_id = $temp[1];

	if($type=='name')
		$q = 'UPDATE subscribers SET name = "'.$value.'", timestamp = '.$time.' WHERE id = '.$subscriber_id.' AND userID = '.get_app_info('main_userID');
	else if($type=='email')
		$q = 'UPDATE subscribers SET email = "'.$value.'", timestamp = '.$time.' WHERE id = '.$subscriber_id.' AND userID = '.get_app_info('main_userID');
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
		echo $value;
	}
	else
		echo "some error occurred!";

?>