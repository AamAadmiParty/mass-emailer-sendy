<?php include('../_connect.php');?>
<?php include('../../includes/helpers/short.php');?>
<?php 
	//-------------------------- ERRORS -------------------------//
	$error_core = array('No data passed', 'API key not passed', 'Invalid API key');
	$error_passed = array('Email not passed', 'List ID not passed', 'Email does not exist in list');
	//-----------------------------------------------------------//
	
	//--------------------------- POST --------------------------//
	//api_key
	if(isset($_POST['api_key'])) $api_key = mysqli_real_escape_string($mysqli, $_POST['api_key']);
	else $api_key = null;
	
	//email
	if(isset($_POST['email'])) $email = mysqli_real_escape_string($mysqli, $_POST['email']);
	else $email = null;
	
	//list_id
	if(isset($_POST['list_id'])) $list_id = short(mysqli_real_escape_string($mysqli, $_POST['list_id']), true);
	else $list_id = null;
	//-----------------------------------------------------------//
	
	//----------------------- VERIFICATION ----------------------//
	//Core data
	if($api_key==null && $email==null && $list_id==null)
	{
		echo $error_core[0];
		exit;
	}
	if($api_key==null)
	{
		echo $error_core[1];
		exit;
	}
	else if(!verify_api_key($api_key))
	{
		echo $error_core[2];
		exit;
	}
	
	//Passed data
	if($email==null)
	{
		echo $error_passed[0];
		exit;
	}
	if($list_id==null)
	{
		echo $error_passed[1];
		exit;
	}
	//-----------------------------------------------------------//
	
	//-------------------------- QUERY --------------------------//
	$q = 'SELECT unsubscribed, bounced, bounce_soft, complaint, confirmed FROM subscribers WHERE email = "'.$email.'" AND list = '.$list_id;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$unsubscribed = $row['unsubscribed'];
			$bounced = $row['bounced'];
			$bounce_soft = $row['bounce_soft'];
			$complaint = $row['complaint'];
			$confirmed = $row['confirmed'];
			
			if(!$unsubscribed && !$bounced && !$bounce_soft && !$complaint && $confirmed) 
				echo 'Subscribed';
			else if(!$confirmed)
				echo 'Unconfirmed';
			else if($unsubscribed)
				echo 'Unsubscribed';
			else if($bounced)
				echo 'Bounced';
			else if($bounce_soft>0)
				echo 'Soft bounced';
			else if($complaint)
				echo 'Complained';
	    }  
	}
	else
	{
		echo $error_passed[2];
	}
	//-----------------------------------------------------------//
?>