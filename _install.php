<?php 
/*
       * Copyright (c) 2013 Sendy.co If you want to obtain license for this product, visit http://sendy.co
       */
${"GLOBALS"} ["kbeknfoncnb"] = "aws_secret";
${"GLOBALS"} ["ipjddkb"] = "r3";
${"GLOBALS"} ["etulnjnnpu"] = "r6";
${"GLOBALS"} ["gkohbveax"] = "r5";
${"GLOBALS"} ["gbcnbbrtxel"] = "q2";
${"GLOBALS"} ["gpvhcitcwr"] = "r2";
${"GLOBALS"} ["wdqtzo"] = "q1";
${"GLOBALS"} ["hxkihpux"] = "r1";
${"GLOBALS"} ["qsqppcfoas"] = "current_domain";
${"GLOBALS"} ["pdiyowu"] = "company";
${"GLOBALS"} ["xtknxntcm"] = "api_key";
${"GLOBALS"} ["eiavdrm"] = "aws_key";
${"GLOBALS"} ["dmgorpweolr"] = "mysqli";
${"GLOBALS"} ["gtlzhjzhev"] = "timezone";
${"GLOBALS"} ["ollrzwi"] = "password";
${"GLOBALS"} ["bbhvhxiuxnc"] = "email";
${"GLOBALS"} ["juugllvuhxd"] = "name";
${"GLOBALS"} ["sqyuwjuvc"] = "license";
${"GLOBALS"} ["kjnhicggq"] = "i";
${"GLOBALS"} ["djktbkio"] = "maxlength";
${"GLOBALS"} ["loljfbsm"] = "usespecial";
${"GLOBALS"} ["rfivuwclrus"] = "usenumbers";
${"GLOBALS"} ["xcxpywh"] = "charset";
${"GLOBALS"} ["nboeawp"] = "key";
${"GLOBALS"} ["fkslenyx"] = "q6";
${"GLOBALS"} ["swyvejlio"] = "q5";
${"GLOBALS"} ["wukgvby"] = "q4";
${"GLOBALS"} ["jarkukot"] = "result";
${"GLOBALS"} ["lqypljdzi"] = "score";
${"GLOBALS"} ["zlnvoravpld"] = "results";
${"GLOBALS"} ["qmkjblo"] = "row";
${"GLOBALS"} ["epruguh"] = "table_count";
${"GLOBALS"} ["rsuvksm"] = "q";
${"GLOBALS"} ["usgzamacxg"] = "r";
${"GLOBALS"} ["lic_key"] = "licensed";
ini_set ( "display_errors", 0 );
${"GLOBALS"} ["yqpybkcskmij"] = "url";
$hckfyeyjfw = "licensed";
$eienmxxur = "result";
include ("includes/header.php");
$fuxfehkw = "url";
$gcjjanyeni = "q";
$jwcdebylrk = "result";
${${"GLOBALS"} ["yqpybkcskmij"]} = $_SERVER ["SERVER_NAME"];
//${$hckfyeyjfw} = file_get_contents_curl ( "https://sendy.co/gateway/" . ${$fuxfehkw} . "/-/-" );
if (false/*!${${"GLOBALS"}["lic_key"]}*/)
{
	echo "<!DOCTYPE html>
    <html>
    <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html;
    charset=utf-8\"/>
    <link rel=\"Shortcut Icon\" type=\"image/ico\" href=\"/img/favicon.png\">
    <title>
    Your domain is not licensed with us</title>
    </head>
    <style type=\"text/css\">
    body{background: #ffffff;
        font-family: Helvetica, Arial;
        }#wrapper{background: #f2f2f2;
        width: 300px;
        height: 110px;
        margin: -140px 0 0 -150px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        }p{text-align: center;
        line-height: 18px;
        font-size: 12px;
        padding: 0 30px;
        }h2{font-weight: normal;
        text-align: center;
        font-size: 20px;
        }a{color: #000;
        }a:hover{text-decoration: none;
    }</style>
    <body>
    <div id=\"wrapper\"><p><h2>
    Unlicensed domain</h2>
    </p><p>You need to install Sendy on the domain you purchased it for.</p></div></body>
    </html>
    ";
	exit ();
}
$ycrvih = "mysqli";
${"GLOBALS"} ["jyafrtrpgeu"] = "score";
${"GLOBALS"} ["buttxvhnv"] = "result";
include ("includes/create/timezone.php");
include ("_compatibility.php");
${"GLOBALS"} ["xphswuwm"] = "result";
${$gcjjanyeni} = "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$dbName' AND 
	(table_name = 'apps' OR table_name = 'campaigns' OR table_name = 'links' OR table_name = 'lists' 
	OR table_name = 'login' OR table_name = 'subscribers')";

${${"GLOBALS"} ["usgzamacxg"]} = mysqli_query ( ${$ycrvih}, ${${"GLOBALS"} ["rsuvksm"]} );
if (${${"GLOBALS"} ["usgzamacxg"]}) {
	$zyefbujpqwyo = "row";
	while ( ${$zyefbujpqwyo} = mysqli_fetch_array ( ${${"GLOBALS"} ["usgzamacxg"]} ) ) {
		${${"GLOBALS"} ["epruguh"]} = ${${"GLOBALS"} ["qmkjblo"]} ["COUNT(*)"];
		${"GLOBALS"} ["dglnxozo"] = "table_count";
		if (${${"GLOBALS"} ["dglnxozo"]} > 0) {
			$ivdgnubvqkk = "table_count";
			$sebakpmv = "table_count";
			if (${$ivdgnubvqkk} == 6)
				echo "<script type=\"text/javascript\">
	        		window.location = \"" . get_app_info ( "path" ) . "\";</script>";
			else if (${$sebakpmv} > 0 && ${${"GLOBALS"} ["epruguh"]} != 6)
				echo "<h2>Use a new database instead</h2>
        		<br>You're using a database with existing tables that will conflict with table names of what Sendy will be using.<br><br>Please create a new database to install Sendy on.";
			exit ();
		}
	}
}
echo "<div class=\"row-fluid\"> <div class=\"span3\"><div class=\"well\"><h3>
    Server compatibility checklist</h3>
    <br>";
${"GLOBALS"} ["ozybufmbtgb"] = "result";
foreach ( ${$eienmxxur} as ${${"GLOBALS"} ["zlnvoravpld"]} ) {
	echo ${${"GLOBALS"} ["zlnvoravpld"]} . "<br>";
}
if (${${"GLOBALS"} ["jyafrtrpgeu"]} < TOTAL_SCORE)
	echo "<br>If you do not pass the compatibility test, either adjust your server settings via php.ini 
		or check with your host. A search via Google for more information may help as well. :)";
else if (${${"GLOBALS"} ["lqypljdzi"]} == TOTAL_SCORE)
	echo "<br>Great. Looks like your server is configured perfectly to run Sendy. :)";
if (${${"GLOBALS"} ["buttxvhnv"]} [1] == "<span class=\"label label-important\"><i class=\"icon-remove icon-white\"></i>mysqli extension is not installed</span>")
	echo "<br><br><b class=\"label label-important\">
		mysqli extension</b><br> Sendy uses \"mysqli\" instead of the old \"mysql\" extension 
		(<a href=\"http://php.net/manual/en/migration55.deprecated.php\" target=\"_blank\">
		<u>now deprecated in PHP 5.5</u></a>), so Sendy is future proof. Install mysqli extension or 
		request your host to do so, otherwise you'll get a \"500 internal server error\". 
		If your host refuse to do so, it's time to bring your business somewhere else.";
if (${${"GLOBALS"} ["ozybufmbtgb"]} [2] == "<span class=\"label label-warning\"><i class=\"icon-remove icon-white\">
</i> mod_rewrite is not enabled</span>")
	echo "<br><br><b class=\"label label-warning\">
mod_rewrite</b><br> mod_rewrite may not be detected especially if you're on a shared server. If the mod_rewrite item is yellow, you can still proceed to install Sendy. If you get a \"404 page not found error\" after being redirected to the login page, <a href=\"https://sendy.co/forum/discussion/5/404-error-after-install/p1\" target=\"_blank\"><u>check this thread</u></a> on our forum for the fix.";
if (${${"GLOBALS"} ["jarkukot"]} [3] == "<span class=\"label label-important\"><i class=\"icon-remove icon-white\">
</i> display_errors is turned on</span>")
	echo "<br><br><b class=\"label label-important\">
display_errors</b><br> display_errors should be turned off for security reasons. Please turn it off or request your host to do this if you're not sure.";
if (${${"GLOBALS"} ["jarkukot"]} [4] == "<span class=\"label label-important\"><i class=\"icon-remove icon-white\">
</i> hash is not enabled</span>")
	echo "<br><br><b class=\"label label-important\">
hash</b><br> hash is required to encrypt passwords. Please enable it or request your host to do this if you're not sure.";
if (${${"GLOBALS"} ["xphswuwm"]} [5] == "<span class=\"label label-important\"><i class=\"icon-remove icon-white\">
</i> curl is not enabled</span>")
	echo "<br><br><b class=\"label label-important\">
curl</b><br> curl is required for Sendy to verify your license as well as send emails via Amazon SES. Installation cannot proceed if curl is disabled. Please enable it or request your host to do this if you're not sure.";
if (${$jwcdebylrk} [6] == "<span class=\"label label-important\"><i class=\"icon-remove icon-white\">
</i> gettext is not enabled</span>")
	echo "<br><br><b class=\"label label-important\">
gettext</b><br> Sendy uses GNU gettext localization framework for translation. If gettext is not enabled, Sendy will fail to load correctly.";
if (${${"GLOBALS"} ["jarkukot"]} [7] == "<span class=\"label label-important\"><i class=\"icon-remove icon-white\">
</i> curl_exec is disabled</span>")
	echo "<br><br><b class=\"label label-important\">
curl_exec</b><br> curl_exec is required for Sendy to verify your license as well as send emails via Amazon SES. Installation cannot proceed if curl_exec is disabled. Remove 'curl_exec' from 'disable_functions' in php.ini. Request your host to do this if you're not sure.";
if (${${"GLOBALS"} ["jarkukot"]} [8] == "<span class=\"label label-important\"><i class=\"icon-remove icon-white\">
</i> curl_multi_exec is disabled</span>")
	echo "<br><br><b class=\"label label-important\">
curl_multi_exec</b><br> curl_multi_exec is required for Sendy to send your emails using multi-threading. Remove 'curl_multi_exec' from 'disable_functions' in php.ini. Request your host to do this if you're not sure.";
echo "\t    </div>\n\t    \n\t    <div class=\"well\">\n\t    \t<h3>
Note</h3>
<br>\n\t    \t<p>Make sure to configure your database credentials and specify the URL to your Sendy installation in <span class=\"label\">includes/config.php</span> before continuing.</p>\n\t    \t<p>Also, don't forget to read our <a href=\"http://sendy.co/get-started\" target=\"_blank\" style=\"text-decoration:underline;
\">Get Started Guide</a> to help you get Sendy up and running.</p>\n\t    </div>\n    </div>\n    <div class=\"span9\">\n    \t<h2>
Install Sendy</h2>
<br>\n    \t\n    \t<div class=\"alert alert-success\" style=\"display:none;
\">\n\t\t  <button class=\"close\" onclick=\"\$('.alert-success').hide();
\">
×</button>
\n\t\t  <strong>Settings have been saved!</strong>\n\t\t</div>\n\t\t\n\t\t<div class=\"alert alert-error\" style=\"display:none;
\">\n\t\t  <button class=\"close\" onclick=\"\$('.alert-error').hide();
\">
×</button>
\n\t\t  <strong>Sorry, unable to save. Please try again later!</strong>\n\t\t</div>\n\t\t\n\t    <form action=\"\" method=\"POST\" accept-charset=\"utf-8\" class=\"form-vertical\">
\n\t        \n\t        <label class=\"control-label\" for=\"license\">
License key*</label>
\n\t    \t<div class=\"control-group\">\n\t\t    \t<div class=\"controls\">\n\t<input type=\"text\" class=\"input-xlarge\" id=\"license\" name=\"license\" placeholder=\"Your license key\">
\n\t            </div>\n\t        </div>\n\t        \n\t    \t<label class=\"control-label\" for=\"company\">
Company*</label>
\n\t    \t<div class=\"control-group\">\n\t\t    \t<div class=\"controls\">\n\t              <input type=\"text\" class=\"input-xlarge\" id=\"company\" name=\"company\" placeholder=\"Your company\">
\n\t            </div>\n\t        </div>\n\t        \n\t        <label class=\"control-label\" for=\"personal_name\">
Name*</label>
\n\t    \t<div class=\"control-group\">\n\t\t    \t<div class=\"controls\">\n\t              <input type=\"text\" class=\"input-xlarge\" id=\"personal_name\" name=\"personal_name\" placeholder=\"Your name\">
\n\t            </div>\n\t        </div>\n\t        \n\t        <label class=\"control-label\" for=\"email\">
Email*</label>
\n\t    \t<div class=\"control-group\">\n\t\t    \t<div class=\"controls\">\n\t              <input type=\"text\" class=\"input-xlarge\" id=\"email\" name=\"email\" placeholder=\"Specify your login email\" autocomplete=\"off\">
\n\t            </div>\n\t        </div>\n\t        \n\t        <label class=\"control-label\" for=\"password\">
Password*</label>
\n\t    \t<div class=\"control-group\">\n\t\t    \t<div class=\"controls\">\n\t              <input type=\"password\" class=\"input-xlarge\" id=\"password\" name=\"password\" placeholder=\"Specify your login password\" autocomplete=\"off\">
\n\t            </div>\n\t        </div>\n\t        \n\t        <div>\n\t        <label for=\"timezone\">
Select your timezone</label>
\n\t    \t\t<select id=\"timezone\" name=\"timezone\">
\n\t\t\t\t  <option value=\"America/New_York\">
America/New_York</option>
\n\t\t\t\t  ";
get_timezone_list ();
echo "\t\t\t\t</select>
\n\t\t\t</div><br>\n\t        \n\t        <label class=\"control-label\" for=\"aws_key\">
AWS Access Key ID</label>
\n\t    \t<div class=\"control-group\">\n\t\t    \t<div class=\"controls\">\n\t              <input type=\"text\" class=\"input-xlarge\" id=\"aws_key\" name=\"aws_key\" placeholder=\"AWS Access Key ID\">
\n\t            </div>\n\t        </div>\n\t        \n\t        <label class=\"control-label\" for=\"aws_secret\">
AWS Secret Access Key</label>
\n\t    \t<div class=\"control-group\">\n\t\t    \t<div class=\"controls\">\n\t              <input type=\"text\" class=\"input-xlarge\" id=\"aws_secret\" name=\"aws_secret\" placeholder=\"AWS Secret Access Key\">
\n\t            </div>\n\t        </div>\n\t        \n\t        <button type=\"submit\" class=\"btn btn-inverse\">
Install now</button>
\n\t    </form>
\n    </div>   \n</div>\n\n";
if (count ( $_POST ) != 0) {
	${"GLOBALS"} ["sdjcuu"] = "q1";
	$ppckbz = "mysqli";
	$bvtmwpzrlv = "company";
	${"GLOBALS"} ["lpnpjjhubvj"] = "q3";
	$fdsbjxbmipw = "q2";
	${${"GLOBALS"} ["sdjcuu"]} = "CREATE TABLE `apps` (\n\t\t\t  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n\t\t\t  `userID` int(11) DEFAULT NULL,\n\t\t\t  `app_name` varchar(100) DEFAULT NULL,\n\t\t\t  `from_name` varchar(100) DEFAULT NULL,\n\t\t\t  `from_email` varchar(100) DEFAULT NULL,\n\t\t\t  `reply_to` varchar(100) DEFAULT NULL,\n\t\t\t  PRIMARY KEY (`id`)\n\t\t\t) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
	\n\t\t";
	${$fdsbjxbmipw} = "CREATE TABLE `campaigns` (\n\t\t\t  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n\t\t\t  `userID` int(11) DEFAULT NULL,\n\t\t\t  `app` int(11) DEFAULT NULL,\n\t\t\t  `from_name` varchar(100) DEFAULT NULL,\n\t\t\t  `from_email` varchar(100) DEFAULT NULL,\n\t\t\t  `reply_to` varchar(100) DEFAULT NULL,\n\t\t\t  `title` varchar(500) DEFAULT NULL,\n\t\t\t  `plain_text` mediumtext,\n\t\t\t  `html_text` mediumtext,\n\t\t\t  `sent` varchar(100) DEFAULT '',\n\t\t\t  `recipients` int(100) DEFAULT '0',\n\t\t\t  `opens` longtext,\n\t\t\t  `wysiwyg` int(11) DEFAULT '0',\n\t\t\t  PRIMARY KEY (`id`)\n\t\t\t) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
	\n\t\t";
	${"GLOBALS"} ["uakninux"] = "mysqli";
	${${"GLOBALS"} ["lpnpjjhubvj"]} = "CREATE TABLE `links` (\n\t\t\t  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n\t\t\t  `campaign_id` int(11) DEFAULT NULL,\n\t\t\t  `link` varchar(500) DEFAULT NULL,\n\t\t\t  `clicks` longtext,\n\t\t\t  PRIMARY KEY (`id`)\n\t\t\t) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
	\n\t\t";
	${${"GLOBALS"} ["wukgvby"]} = "CREATE TABLE `lists` (\n\t\t\t  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n\t\t\t  `app` int(11) DEFAULT NULL,\n\t\t\t  `userID` int(11) DEFAULT NULL,\n\t\t\t  `name` varchar(100) DEFAULT NULL,\n\t\t\t  PRIMARY KEY (`id`)\n\t\t\t) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
	\n\t\t";
	${${"GLOBALS"} ["swyvejlio"]} = "CREATE TABLE `login` (\n\t\t\t  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n\t\t\t  `name` varchar(100) DEFAULT NULL,\n\t\t\t  `company` varchar(100) DEFAULT NULL,\n\t\t\t  `username` varchar(100) DEFAULT NULL,\n\t\t\t  `password` varchar(500) DEFAULT NULL,\n\t\t\t  `s3_key` varchar(500) DEFAULT NULL,\n\t\t\t  `s3_secret` varchar(500) DEFAULT NULL,\n\t\t\t  `api_key` varchar(500) DEFAULT NULL,\n\t\t\t  `license` varchar(100) DEFAULT NULL,\n\t\t\t  `timezone` varchar(100) DEFAULT NULL,\n\t\t\t  PRIMARY KEY (`id`)\n\t\t\t) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
	\n\t\t";
	$jbqucuxsdp = "mysqli";
	$wwqfdsv = "current_domain";
	${"GLOBALS"} ["yhcomry"] = "name";
	$eljpiu = "mysqli";
	${${"GLOBALS"} ["fkslenyx"]} = "CREATE TABLE `subscribers` (\n\t\t\t  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n\t\t\t  `userID` int(11) DEFAULT NULL,\n\t\t\t  `name` varchar(100) DEFAULT NULL,\n\t\t\t  `email` varchar(100) DEFAULT NULL,\n\t\t\t  `list` int(11) DEFAULT NULL,\n\t\t\t  `unsubscribed` int(11) DEFAULT '0',\n\t\t\t  `bounced` int(11) DEFAULT '0',\n\t\t\t  `last_campaign` int(11) DEFAULT NULL,\n\t\t\t  `timestamp` int(100) DEFAULT NULL,\n\t\t\t  PRIMARY KEY (`id`)\n\t\t\t) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
	\n\t\t";
	${"GLOBALS"} ["mipaayoo"] = "pass_encrypted";
	function str_makerand($minlength, $maxlength, $useupper, $usespecial, $usenumbers) {
		$yzyxatr = "charset";
		$qiioqbr = "minlength";
		$kmlsttu = "i";
		$fezqiwzxyn = "useupper";
		${"GLOBALS"} ["etqzplnwfe"] = "maxlength";
		$disrireapjj = "minlength";
		${"GLOBALS"} ["lbunvsupin"] = "minlength";
		${${"GLOBALS"} ["nboeawp"]} = "";
		${$yzyxatr} = "abcdefghijklmnopqrstuvwxyz";
		if (${$fezqiwzxyn})
			${${"GLOBALS"} ["xcxpywh"]} .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$emajsdywvyl = "length";
		$dwamjty = "length";
		if (${${"GLOBALS"} ["rfivuwclrus"]})
			${${"GLOBALS"} ["xcxpywh"]} .= "0123456789";
		${"GLOBALS"} ["foygbxrqppy"] = "i";
		if (${${"GLOBALS"} ["loljfbsm"]})
			${${"GLOBALS"} ["xcxpywh"]} .= "~@#\$%^*()_+-={}|][";
		${"GLOBALS"} ["wxxjtkmmten"] = "length";
		$vzhriizrwdb = "key";
		if (${$disrireapjj} > ${${"GLOBALS"} ["etqzplnwfe"]})
			${$dwamjty} = mt_rand ( ${${"GLOBALS"} ["djktbkio"]}, ${$qiioqbr} );
		else
			${$emajsdywvyl} = mt_rand ( ${${"GLOBALS"} ["lbunvsupin"]}, ${${"GLOBALS"} ["djktbkio"]} );
		for(${${"GLOBALS"} ["foygbxrqppy"]} = 0; ${$kmlsttu} < ${${"GLOBALS"} ["wxxjtkmmten"]}; ${${"GLOBALS"} ["kjnhicggq"]} ++)
			${$vzhriizrwdb} .= ${${"GLOBALS"} ["xcxpywh"]} [(mt_rand ( 0, (strlen ( ${${"GLOBALS"} ["xcxpywh"]} ) - 1) ))];
		return ${${"GLOBALS"} ["nboeawp"]};
	}
	$pnqonkmgq = "mysqli";
	${"GLOBALS"} ["kxediksvnxr"] = "mysqli";
	$pjdpheeckpx = "aws_secret";
	$qtkvtlxxwxq = "mysqli";
	${${"GLOBALS"} ["sqyuwjuvc"]} = mysqli_real_escape_string ( ${${"GLOBALS"} ["uakninux"]}, $_POST ["license"] );
	${$bvtmwpzrlv} = mysqli_real_escape_string ( ${$ppckbz}, $_POST ["company"] );
	${${"GLOBALS"} ["juugllvuhxd"]} = mysqli_real_escape_string ( ${$eljpiu}, $_POST ["personal_name"] );
	${${"GLOBALS"} ["bbhvhxiuxnc"]} = mysqli_real_escape_string ( ${${"GLOBALS"} ["kxediksvnxr"]}, $_POST ["email"] );
	${${"GLOBALS"} ["ollrzwi"]} = mysqli_real_escape_string ( ${$jbqucuxsdp}, $_POST ["password"] );
	${${"GLOBALS"} ["gtlzhjzhev"]} = mysqli_real_escape_string ( ${${"GLOBALS"} ["dmgorpweolr"]}, $_POST ["timezone"] );
	${${"GLOBALS"} ["mipaayoo"]} = hash ( "sha512", ${${"GLOBALS"} ["ollrzwi"]} . "PectGtma" );
	${"GLOBALS"} ["vwoaygpl"] = "email";
	${${"GLOBALS"} ["eiavdrm"]} = mysqli_real_escape_string ( ${$pnqonkmgq}, $_POST ["aws_key"] );
	${$pjdpheeckpx} = mysqli_real_escape_string ( ${$qtkvtlxxwxq}, $_POST ["aws_secret"] );
	${${"GLOBALS"} ["xtknxntcm"]} = str_makerand ( 20, 20, true, false, true );
	${$wwqfdsv} = $_SERVER ["HTTP_HOST"];
	if (${${"GLOBALS"} ["pdiyowu"]} != "" && ${${"GLOBALS"} ["yhcomry"]} != "" && ${${"GLOBALS"} ["vwoaygpl"]} != "" && ${${"GLOBALS"} ["ollrzwi"]} != ""/*&&${${"GLOBALS"}["sqyuwjuvc"]}!=""*/)
	{
		echo "inside";
		${"GLOBALS"} ["eliltqtci"] = "licensed";
		${"GLOBALS"} ["ivssqjywkp"] = "license";
		// echo "-------"."https://sendy.co/gateway/".${${"GLOBALS"}["qsqppcfoas"]}."/".${${"GLOBALS"}["ivssqjywkp"]}."/".ipaddress()."-------";
		// ${${"GLOBALS"}["eliltqtci"]}=file_get_contents_curl("https://sendy.co/gateway/".${${"GLOBALS"}["qsqppcfoas"]}."/".${${"GLOBALS"}["ivssqjywkp"]}."/".ipaddress());
		if (true/*${${"GLOBALS"}["lic_key"]}*/)
    	{
			$frntivvee = "q3";
			${"GLOBALS"} ["edzaeafpkdo"] = "mysqli";
			${"GLOBALS"} ["pmdgpy"] = "r2";
			$qxpiqfnlryb = "r4";
			${${"GLOBALS"} ["hxkihpux"]} = mysqli_query ( ${${"GLOBALS"} ["edzaeafpkdo"]}, ${${"GLOBALS"} ["wdqtzo"]} );
			${"GLOBALS"} ["jqjwgqaoc"] = "r4";
			$gsldupnkdkb = "mysqli";
			$mimfkeu = "r3";
			${${"GLOBALS"} ["gpvhcitcwr"]} = mysqli_query ( ${${"GLOBALS"} ["dmgorpweolr"]}, ${${"GLOBALS"} ["gbcnbbrtxel"]} );
			${"GLOBALS"} ["mdbmhaevmh"] = "r1";
			${"GLOBALS"} ["sfwlqnm"] = "mysqli";
			${$mimfkeu} = mysqli_query ( ${${"GLOBALS"} ["sfwlqnm"]}, ${$frntivvee} );
			${${"GLOBALS"} ["jqjwgqaoc"]} = mysqli_query ( ${${"GLOBALS"} ["dmgorpweolr"]}, ${${"GLOBALS"} ["wukgvby"]} );
			${${"GLOBALS"} ["gkohbveax"]} = mysqli_query ( ${${"GLOBALS"} ["dmgorpweolr"]}, ${${"GLOBALS"} ["swyvejlio"]} );
			${${"GLOBALS"} ["etulnjnnpu"]} = mysqli_query ( ${$gsldupnkdkb}, ${${"GLOBALS"} ["fkslenyx"]} );
			if (${${"GLOBALS"} ["mdbmhaevmh"]} && ${${"GLOBALS"} ["pmdgpy"]} && ${${"GLOBALS"} ["ipjddkb"]} && ${$qxpiqfnlryb} && ${${"GLOBALS"} ["gkohbveax"]} && ${${"GLOBALS"} ["etulnjnnpu"]}) {
				$nyywryu = "aws_key";
				${"GLOBALS"} ["vrggdtiimk"] = "timezone";
				${"GLOBALS"} ["sjnnosmirgm"] = "q";
				${"GLOBALS"} ["fdzbpikpcl"] = "name";
				$bxkitdwf = "license";
				${"GLOBALS"} ["kkrrjlv"] = "pass_encrypted";
				${"GLOBALS"} ["xgsirok"] = "company";
				$dtaoqcvli = "mysqli";
				${"GLOBALS"} ["dsdlooeijqs"] = "api_key";
				${${"GLOBALS"} ["rsuvksm"]} = "INSERT INTO login (company, name, username, password, 
	            	s3_key, s3_secret, api_key, license, timezone) 
					VALUES ('" . ${${"GLOBALS"} ["xgsirok"]} . "' , '" . ${${"GLOBALS"} ["fdzbpikpcl"]} . "',
					'" . ${${"GLOBALS"} ["bbhvhxiuxnc"]} . "', 
					'" . ${${"GLOBALS"} ["kkrrjlv"]} . "',
					'" . ${$nyywryu} . "',
					'" . ${${"GLOBALS"} ["kbeknfoncnb"]} . "',
					'" . ${${"GLOBALS"} ["dsdlooeijqs"]} . "',
					'" . ${$bxkitdwf} . "', 
					'" . ${${"GLOBALS"} ["vrggdtiimk"]} . "')";
				${${"GLOBALS"} ["usgzamacxg"]} = mysqli_query ( ${$dtaoqcvli}, ${${"GLOBALS"} ["sjnnosmirgm"]} );
				if (${${"GLOBALS"} ["usgzamacxg"]}) {
					echo "<script type=\"text/javascript\">
                        window.location = \"" . get_app_info ( "path" ) . "/login\";
                        </script>";
				}
			}
		}
	} else {
		header ( "Location: " . get_app_info ( "path" ) . "/_install.php" );
	}
}
include ("includes/footer.php");
?>