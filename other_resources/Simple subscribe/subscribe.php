<?php 
	//-------------------------- You need to set these --------------------------//
	$your_installation_url = 'http://your_sendy_installation_url'; //Your Sendy installation (without the trailing slash)
	$list = 'your_list_id'; //Can be retrieved from "View all lists" page
	$success_url = 'http://google.com'; //URL user will be redirected to if successfully subscribed
	$fail_url = 'http://yahoo.com'; //URL user will be redirected to if subscribing fails
	//---------------------------------------------------------------------------//

	//POST variables
	$name = $_POST['name'];
	$email = $_POST['email'];
	$boolean = 'true';
	
	//Check fields
	if($name=='' || $email=='')
	{
		echo 'Please fill in all fields.';
		exit;
	}
	
	//Subscribe
	$postdata = http_build_query(
	    array(
	    'name' => $name,
	    'email' => $email,
	    'list' => $list,
	    'boolean' => 'true'
	    )
	);
	$opts = array('http' => array('method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded', 'content' => $postdata));
	$context  = stream_context_create($opts);
	$result = file_get_contents($your_installation_url.'/subscribe', false, $context);
	
	//check result and redirect
	if($result)
		header("Location: $success_url");
	else
		header("Location: $fail_url");
?>