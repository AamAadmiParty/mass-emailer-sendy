<?php 
	include('../config.php');
	//--------------------------------------------------------------//
	function dbConnect() { //Connect to database
	//--------------------------------------------------------------//
	    // Access global variables
	    global $mysqli;
	    global $dbHost;
	    global $dbUser;
	    global $dbPass;
	    global $dbName;
	    
	    // Attempt to connect to database server
	    if(isset($dbPort)) $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort);
	    else $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
	
	    // If connection failed...
	    if ($mysqli->connect_error) {
	        fail();
	    }
	    
	    global $charset; mysqli_set_charset($mysqli, isset($charset) ? $charset : "utf8");
	    
	    return $mysqli;
	}
	//--------------------------------------------------------------//
	function fail() { //Database connection fails
	//--------------------------------------------------------------//
	    print 'Database error';
	    exit;
	}
	// connect to database
	dbConnect();
?>
<?php 
	if (!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
	$data = json_decode($HTTP_RAW_POST_DATA);
	$time = time();
	$complaint_simulator_email = 'complaint@simulator.amazonses.com';
	
	//Confirm SNS subscription
	if($data->Type == 'SubscriptionConfirmation')
	{
		file_get_contents_curl($data->SubscribeURL);
	}
	else
	{
		//detect complaints
		$obj = json_decode($data->Message);
		$notificationType = $obj->{'notificationType'};
		$problem_email = $obj->{'complaint'}->{'complainedRecipients'};
		$problem_email = $problem_email[0]->{'emailAddress'};
		$from_email = $obj->{'mail'}->{'source'};
		$from_email = str_replace(array('"Sendy" <', '>'), '', $from_email);
		
		//check if email is valid, if not, exit
		if(!filter_var($problem_email,FILTER_VALIDATE_EMAIL)) exit;
		
		if($notificationType=='Complaint')
		{			
			//Update Bounce status
			if($problem_email==$complaint_simulator_email) 
			{
				mysqli_query($mysqli, 'UPDATE apps SET complaint_setup=1 WHERE from_email = "'.$from_email.'"');
				mysqli_query($mysqli, 'UPDATE campaigns SET complaint_setup=1 WHERE from_email = "'.$from_email.'"');
			}
			
			//get the id of the last campaign
			$q = 'SELECT last_campaign, last_ares FROM subscribers WHERE email = "'.$problem_email.'"';
			$r = mysqli_query($mysqli, $q);
			if ($r && mysqli_num_rows($r) > 0)
			{
			    while($row = mysqli_fetch_array($r))
			    {
					$campaign_id = $row['last_campaign'];
					$ares_emails_id = $row['last_ares'];
					
					if($campaign_id=='')
						$campaign_id = 0;
					if($ares_emails_id=='')
						$ares_emails_id = 0;
						
					//Update database of
					$q2 = 'UPDATE subscribers SET unsubscribed = 0, bounced = 0, complaint = 1, timestamp = '.$time.' WHERE email = "'.$problem_email.'" AND (last_campaign = '.$campaign_id.' OR last_ares = '.$ares_emails_id.')';
					mysqli_query($mysqli, $q2);
			    }  
			}
		}
	}
	
	//--------------------------------------------------------------//
	function file_get_contents_curl($url) 
	//--------------------------------------------------------------//
	{
		//Get server path
		$server_path_array = explode('includes/campaigns/complaints.php', $_SERVER['SCRIPT_FILENAME']);
	    $server_path = $server_path_array[0];
	    $ca_cert_bundle = $server_path.'certs/cacert.pem';
	    
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_CAINFO, $ca_cert_bundle);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
?>