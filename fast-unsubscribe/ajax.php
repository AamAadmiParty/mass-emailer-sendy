<?
// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(-1);
include("config.php");
require_once "Mail-1.2.0/Mail.php"; //should have pear installed, also Net_SMTP. use "pear install Net_SMTP"
$con = mysqli_connect( DB_HOST, DB_USER, DB_PASS) or (header('HTTP/1.1 500 Could not connect to mysql server.', true, 500) xor die);
mysqli_select_db($con, DB_NAME) or (header('HTTP/1.1 500 Could not select database. Error: '.mysqli_error($con), true, 500) xor die);
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	$name = mysqli_real_escape_string($con, $_REQUEST['input13']);
	$email = mysqli_real_escape_string($con, $_REQUEST['input14']);
	$phone = mysqli_real_escape_string($con, $_REQUEST['input15']);
	$topic = mysqli_real_escape_string($con, $_REQUEST['select1']);
	$feedback = mysqli_real_escape_string($con, $_REQUEST['textarea2']);

	if($name!="" && $email!="" && $feedback!="")
	{
		$sql="INSERT INTO feedback (name, email, phone, topic, feedback) VALUES
			('$name', '$email', '$phone', '$topic', '$feedback')";
		if (!mysqli_query($con,$sql))
		{
	  		header('HTTP/1.1 500 error occurred: ' . mysqli_error($con), true, 500) xor die;
	  	}
		
		header('HTTP/1.1 200 Feedback acknowledged.', true, 200);

		$from = 'alexpeterace@gmail.com';
		$to = "test@prakhargoel.com";
		$subject = 'Feedback for sendy - '.$topic;
		$feedback2 = $_REQUEST['textarea2'];
		$body = "From: $name <$email>\nPhone: $phone\nTopic: $topic\n\nFeedback: $feedback2";
		$replyto = "$name <$email>";

		$headers = array(
		    'From' => $from,
		    'Reply-To' => $replyto,
		    'To' => $to,
		    'Subject' => $subject
		);

		$smtp = Mail::factory('smtp', array(
		        'host' => 'ssl://smtp.gmail.com',
		        'port' => '465',
		        'auth' => true,
		        'username' => 'alexpeterace@gmail.com',
		        'password' => '12345678!@#'
		    ));

		$mail = $smtp->send($to, $headers, $body);

		if (PEAR::isError($mail)) {
		    echo('<p>' . $mail->getMessage() . '</p>');
		} else {
		    echo('<p>Message successfully sent!</p>');
		}		

	}
	else
	{
		header('HTTP/1.1 401 All fields not received', true, 401);
		die();
	}
}

?>