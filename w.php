<?php 
	ini_set('display_errors', 0);
	include('includes/config.php');
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
	        fail("<!DOCTYPE html><html><head><meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\"/><link rel=\"Shortcut Icon\" type=\"image/ico\" href=\"/img/favicon.png\"><title>"._('Can\'t connect to database')."</title></head><style type=\"text/css\">body{background: #ffffff;font-family: Helvetica, Arial;}#wrapper{background: #f2f2f2;width: 300px;height: 110px;margin: -140px 0 0 -150px;position: absolute;top: 50%;left: 50%;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;}p{text-align: center;line-height: 18px;font-size: 12px;padding: 0 30px;}h2{font-weight: normal;text-align: center;font-size: 20px;}a{color: #000;}a:hover{text-decoration: none;}</style><body><div id=\"wrapper\"><p><h2>"._('Can\'t connect to database')."</h2></p><p>"._('There is a problem connecting to the database. Please try again later.')."</p></div></body></html>");
	    }
	    
	    global $charset; mysqli_set_charset($mysqli, isset($charset) ? $charset : "utf8");
	    
	    return $mysqli;
	}
	//--------------------------------------------------------------//
	function fail($errorMsg) { //Database connection fails
	//--------------------------------------------------------------//
	    echo $errorMsg;
	    exit;
	}
	// connect to database
	dbConnect();
?>
<?php
	include('includes/helpers/short.php');
	
	//get variable
	$i = mysqli_real_escape_string($mysqli, $_GET['i']);
	if($i=='')
	{
		exit;
	}
	$i_array = explode('/', $i);
	if(count($i_array)==3 || count($i_array)==4)
	{
		$subscriber_id = short($i_array[0], true);
		$subscriber_list = short($i_array[1], true);
		$campaign_id = short($i_array[2], true);
		$just_show_html = false;
		
		if(count($i_array)==4 && $i_array[3]=='a')
			$table = 'ares_emails';
		else
			$table = 'campaigns';
	}
	else if(count($i_array)==1 || count($i_array)==2)
	{
		$campaign_id = short($i_array[0], true);
		$just_show_html = true;
		
		if(count($i_array)==2 && $i_array[1]=='a')
			$table = 'ares_emails';
		else
			$table = 'campaigns';
	}
	else
		exit;	
	
	//get html text from campaign
	$q = 'SELECT from_email, html_text FROM '.$table.' WHERE id = '.$campaign_id;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$html = $row['html_text'];
			$from_email = $row['from_email'];
			
			if($just_show_html)
			{
				//tags
				preg_match_all('/\[([a-zA-Z0-9!#%^&*()+=$@._-|\/?<>~`"\'\s]+),\s*fallback=/i', $html, $matches_var, PREG_PATTERN_ORDER);
				preg_match_all('/,\s*fallback=([a-zA-Z0-9!,#%^&*()+=$@._-|\/?<>~`"\'\s]*)\]/i', $html, $matches_val, PREG_PATTERN_ORDER);
				preg_match_all('/(\[[a-zA-Z0-9!#%^&*()+=$@._-|\/?<>~`"\'\s]+,\s*fallback=[a-zA-Z0-9!,#%^&*()+=$@._-|\/?<>~`"\'\s]*\])/i', $html, $matches_all, PREG_PATTERN_ORDER);
				$matches_var = $matches_var[1];
				$matches_val = $matches_val[1];
				$matches_all = $matches_all[1];
				for($i=0;$i<count($matches_var);$i++)
				{   
					$field = $matches_var[$i];
					$fallback = $matches_val[$i];
					$tag = $matches_all[$i];
					//for each match, replace tag with fallback
					$html = str_replace($tag, $fallback, $html);
				}
				//Email tag
				$html = str_replace('[Email]', $from_email, $html);
	
				//set web version links
				$html = str_replace('<webversion', '<a href="#" ', $html);
				$html = str_replace('</webversion>', '</a>', $html);
				$html = str_replace('[webversion]', 'http://the_webversion_link', $html);
				
				//set unsubscribe links
				$html = str_replace('<unsubscribe', '<a href="#" ', $html);
				$html = str_replace('</unsubscribe>', '</a>', $html);
				$html = str_replace('[unsubscribe]', 'http://the_unsubscribe_link', $html);
				
				echo $html;
				exit;
			}
	    }  
	}
	
	//replace new links on HTML code
	$links = array();
	//extract all links from HTML
	preg_match_all('/href=["\']([^"\']+)["\']/i', $html, $matches, PREG_PATTERN_ORDER);
	$matches = array_unique($matches[1]);
	foreach($matches as $var)
	{    
		if($var!="#" && substr($var, 0, 6)!="mailto")
		{
	    	array_push($links, $var);
	    }
	}
	
	//if this is an autoresponder web version,
	if(count($i_array)==4 && $i_array[3]=='a')
		$q2 = 'SELECT * FROM links WHERE ares_emails_id = '.$campaign_id;
	else
		$q2 = 'SELECT * FROM links WHERE campaign_id = '.$campaign_id;
	$r2 = mysqli_query($mysqli, $q2);
	if ($r2 && mysqli_num_rows($r2) > 0)
	{			
	    while($row2 = mysqli_fetch_array($r2))
	    {
	    	$linkID = $row2['id'];
			$link = $row2['link'];
			
			//replace new links on HTML code
	    	$html = str_replace('href="'.$link.'"', 'href="'.APP_PATH.'/l/'.short($subscriber_id).'/'.short($linkID).'/'.short($campaign_id).'"', $html);
	    	$html = str_replace('href=\''.$link.'\'', 'href="'.APP_PATH.'/l/'.short($subscriber_id).'/'.short($linkID).'/'.short($campaign_id).'"', $html);
	    }  
	}
	
	//get user's email for unsubscription link formatting
	$q = 'SELECT name, email, custom_fields FROM subscribers WHERE id = '.$subscriber_id;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$name = trim($row['name']);
			$email = trim($row['email']);
			$custom_values = $row['custom_fields'];
	    }  
	}
	
	//tags
	preg_match_all('/\[([a-zA-Z0-9!#%^&*()+=$@._-|\/?<>~`"\'\s]+),\s*fallback=/i', $html, $matches_var, PREG_PATTERN_ORDER);
	preg_match_all('/,\s*fallback=([a-zA-Z0-9!,#%^&*()+=$@._-|\/?<>~`"\'\s]*)\]/i', $html, $matches_val, PREG_PATTERN_ORDER);
	preg_match_all('/(\[[a-zA-Z0-9!#%^&*()+=$@._-|\/?<>~`"\'\s]+,\s*fallback=[a-zA-Z0-9!,#%^&*()+=$@._-|\/?<>~`"\'\s]*\])/i', $html, $matches_all, PREG_PATTERN_ORDER);
	$matches_var = $matches_var[1];
	$matches_val = $matches_val[1];
	$matches_all = $matches_all[1];
	for($i=0;$i<count($matches_var);$i++)
	{   
		$field = $matches_var[$i];
		$fallback = $matches_val[$i];
		$tag = $matches_all[$i];
		
		if($field=='Name')
		{
			if($name=='')
			{
				$html = str_replace($tag, $fallback, $html);
			}
			else
			{
				$html = str_replace($tag, $name, $html);
			}
		}
		//otherwise, replace custom field tag
		else
		{					
			$q5 = 'SELECT custom_fields FROM lists WHERE id = '.$subscriber_list;
			$r5 = mysqli_query($mysqli, $q5);
			if ($r5)
			{
			    while($row2 = mysqli_fetch_array($r5)) $custom_fields = $row2['custom_fields'];
			    $custom_fields_array = explode('%s%', $custom_fields);
			    $custom_values_array = explode('%s%', $custom_values);
			    $cf_count = count($custom_fields_array);
			    $k = 0;
			    
			    for($j=0;$j<$cf_count;$j++)
			    {
				    $cf_array = explode(':', $custom_fields_array[$j]);
				    $key = str_replace(' ', '', $cf_array[0]);
				    
				    //if tag matches a custom field
				    if($field==$key)
				    {
				    	if(array_key_exists($j, $custom_values_array)) $cva = $custom_values_array[$j];
				    	else $cva = '';
				    	
				    	//if custom field is empty, use fallback
				    	if($cva=='')
					    	$html = str_replace($tag, $fallback, $html);
				    	//otherwise, use the custom field value
				    	else
				    	{
				    		//if custom field is of 'Date' type, format the date
				    		if($cf_array[1]=='Date')
					    		$html = str_replace($tag, strftime("%a, %b %d, %Y", $cva), $html);
				    		//otherwise just replace tag with custom field value
				    		else
						    	$html = str_replace($tag, $cva, $html);
				    	}
				    }
				    else
				    	$k++;
			    }
			    if($k==$cf_count)
			    	$html = str_replace($tag, $fallback, $html);
			}
		}
	}
	//Email tag
	$html = str_replace('[Email]', $email, $html);
	
	//set web version links
	$html = str_replace('<webversion', '<a href="'.APP_PATH.'/w/'.short($subscriber_id).'/'.short($subscriber_list).'/'.short($campaign_id).'" ', $html);
	$html = str_replace('</webversion>', '</a>', $html);
	$html = str_replace('[webversion]', APP_PATH.'/w/'.short($subscriber_id).'/'.short($subscriber_list).'/'.short($campaign_id), $html);
	
	//set unsubscribe links
	$html = str_replace('<unsubscribe', '<a href="'.APP_PATH.'/unsubscribe/'.short($email).'/'.short($subscriber_list).'/'.short($campaign_id).'" ', $html);
	$html = str_replace('</unsubscribe>', '</a>', $html);
	$html = str_replace('[unsubscribe]', APP_PATH.'/unsubscribe/'.short($email).'/'.short($subscriber_list).'/'.short($campaign_id), $html);
	
	//Update click count
	//if this is an autoresponder web version,
	if(count($i_array)==4 && $i_array[3]=='a')
		$q = 'SELECT clicks, link FROM links WHERE link = "'.APP_PATH.'/w/'.$i_array[2].'/a"';
	else
		$q = 'SELECT clicks, link FROM links WHERE link = "'.APP_PATH.'/w/'.$i_array[2].'"';
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$clicks = $row['clicks'];
			$link = $row['link'];
			
			if($clicks=='')
				$val = $subscriber_id;
			else
			{
				$clicks .= ','.$subscriber_id;
				$val = $clicks;
			}
	    }  
	}	
	//if this is an autoresponder web version,
	if(count($i_array)==4 && $i_array[3]=='a')
		$q = 'UPDATE links SET clicks = "'.$val.'" WHERE link = "'.APP_PATH.'/w/'.$i_array[2].'/a"';
	else
		$q = 'UPDATE links SET clicks = "'.$val.'" WHERE link = "'.APP_PATH.'/w/'.$i_array[2].'"';
	$r = mysqli_query($mysqli, $q);
	if ($r){}
	
	echo $html;
?>