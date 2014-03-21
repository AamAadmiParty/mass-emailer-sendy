<?php include('../functions.php');?>
<?php include('../login/auth.php');?>
<?php
	$time = time();
	$ids = $_POST['ids_to_send'];
	$action = $_POST['action'];
	$success_array = array();
	foreach ($ids as $row) {
		$temp = explode('--',$row);
		$reqid = $temp[0];
		$ids_csv = $temp[1];
		if($action == "approve")
		{
			$q = 'UPDATE subscribers SET unsubscribed = 1, timestamp = '.$time.' WHERE id in ('.$ids_csv.') AND userID = '.get_app_info('main_userID');
			$r = mysqli_query($mysqli, $q);
			if ($r)
			{
				$q = 'UPDATE unsubscriberequests SET status = 1 WHERE id ='.$reqid;
				$r = mysqli_query($mysqli, $q);
				if ($r)
				{
					array_push($success_array, $reqid);
				}
			}			
		}
		else if($action == "reject")
		{
			$q = 'UPDATE unsubscriberequests SET status = 2 WHERE id ='.$reqid;
			$r = mysqli_query($mysqli, $q);
			if ($r)
			{
				array_push($success_array, $reqid);
			}
		}
	}
	echo implode(",", $success_array);
?>