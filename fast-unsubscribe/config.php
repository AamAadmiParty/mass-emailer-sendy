<?php
include('../includes/config.php');
define('DB_HOST', $dbHost);
define('DB_USER', $dbUser);
define('DB_PASS', $dbPass);
define('DB_NAME', $dbName);
$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);

// define("SMTP_HOST", "SMTP_HOST_NAME"); //Hostname of the mail server
// define("SMTP_PORT", "SMTP_PORT"); //Port of the SMTP like to be 25, 80, 465 or 587
// define("SMTP_UNAME", "VALID_EMAIL_ACCOUNT"); //Username for SMTP authentication any valid email created in your domain
// define("SMTP_PWORD", "VALID_EMAIL_ACCOUNTS_PASSWORD"); //Password for SMTP authentication

?>