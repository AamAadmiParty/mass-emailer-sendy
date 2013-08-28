<?php 
	include('includes/config.php');
	include('includes/helpers/locale.php');
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
	define('PAYPAL_URL', 'https://www.paypal.com/us/cgi-bin/webscr');
	//define('PAYPAL_URL', 'https://www.sandbox.paypal.com/us/cgi-bin/webscr');
	
	//POST data
	$schedule = $_POST['pay-and-schedule'];
	$cron = $_POST['cron'];
	
	if($schedule=='true')
	{
		$campaign_id = mysqli_real_escape_string($mysqli, $_POST['campaign_id']);
		$app = mysqli_real_escape_string($mysqli, $_POST['app']);
		$email_list = $_POST['email_lists'];
		$paypal_email = $_POST['paypal2'];
		$total = $_POST['grand_total_val2'];		
		$send_date = $_POST['send_date'];
		$hour = $_POST['hour'];
		$ampm = $_POST['ampm'];
		if($ampm=='pm' && $hour!=12)
			$hour += 12;
		if($ampm=='am' && $hour==12)
			$hour = 00;
		$min = $_POST['min'];
		$timezone = $_POST['timezone'];
		$send_date_array = explode('-', $send_date);
		$month = $send_date_array[0];
		$day = $send_date_array[1];
		$year = $send_date_array[2];
		$the_date = mktime($hour, $min, 0, $month, $day, $year);
	}
	else
	{
		$campaign_id = mysqli_real_escape_string($mysqli, $_POST['cid']);
		$app = mysqli_real_escape_string($mysqli, $_POST['uid']);
		$email_list = $_POST['email_list'];
		$paypal_email = $_POST['paypal'];
		$total = $_POST['grand_total_val'];
		$email_list_implode = implode(',', $email_list);
	}	
	
	//Set language
	$q = 'SELECT login.language FROM campaigns, login WHERE campaigns.id = '.$campaign_id.' AND login.app = campaigns.app';
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0) while($row = mysqli_fetch_array($r)) $language = $row['language'];
	set_locale($language);

	//get currency
	$q = 'SELECT currency FROM apps WHERE id = '.$app;
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$currency = $row['currency'];
	    }  
	}
	
	//get campaign name
	$q = 'SELECT title FROM campaigns WHERE id = '.$campaign_id;
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$title = $row['title'];
	    }  
	}
?>
<html>  
<head>
<title><?php echo _('Sending you to PayPal');?>..</title>
</head>
<body style="text-align:center;position: absolute; top: 50%; left: 50%;	margin-top: -150px;	margin-left: -130px;"> 
<form id="form" action="<?php echo PAYPAL_URL;?>" method="post" name="_xclick"> 
 
<div> 
<p style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif; text-shadow: 1px 1px white; color: #424749; background-color:#E6E6E6; padding-left:10px; padding:10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-bottom: 1px #D0D0D0 solid; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;"><?php echo _('Sending you to PayPal, one moment please');?>..</p>
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $paypal_email;?>">
<input type="hidden" name="currency_code" value="<?php echo $currency;?>">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="item_name" value="<?php echo _('Campaign for');?> <?php echo $title?>">
<?php if($schedule=='true'):?>
<input type="hidden" name="return" value="<?php echo APP_PATH;?>/sending?i=<?php echo $app?>&c=<?php echo $campaign_id;?>&e=<?php echo $email_list;?>&s=true&date=<?php echo $the_date;?>&timezone=<?php echo $timezone;?>">
<?php else:?>
<input type="hidden" name="return" value="<?php echo APP_PATH;?>/sending?i=<?php echo $app?>&c=<?php echo $campaign_id;?>&e=<?php echo $email_list_implode;?>&cr=<?php echo $cron;?>">
<?php endif;?>
<input type="hidden" name="cancel_return" value="<?php echo APP_PATH;?>/send-to?i=<?php echo $app?>&c=<?php echo $campaign_id;?>">
<input type="hidden" name="amount" value="<?php echo $total;?>">
</div>
 
<noscript> 
<br/>
<input type="submit" value="<?php echo _('Click here to proceed');?> >>" /> 
</noscript> 
 
</form> 
 
<script> 
document.getElementById('form').submit();
</script> 
 
</body> 
</html>