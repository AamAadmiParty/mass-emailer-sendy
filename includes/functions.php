<?php 
/*
       * Copyright (c) 2013 Sendy.co If you want to obtain license for this product, visit http://sendy.co
       */

${"GLOBALS"} ["ehyvrccm"] = "co";
${"GLOBALS"} ["awpgmxabrxpa"] = "i";
${"GLOBALS"} ["mvfvwqa"] = "maxlength";
${"GLOBALS"} ["rvbasvpo"] = "length";
${"GLOBALS"} ["yecvgmxd"] = "minlength";
${"GLOBALS"} ["uimenadkir"] = "usespecial";
${"GLOBALS"} ["hnpuasixxfi"] = "usenumbers";
${"GLOBALS"} ["qqiggzfni"] = "key";
${"GLOBALS"} ["niqbaxqrye"] = "atts";
${"GLOBALS"} ["fbtkwhnwkfpe"] = "img";
${"GLOBALS"} ["rbcfiqu"] = "url";
${"GLOBALS"} ["gjgxaieserz"] = "data";
${"GLOBALS"} ["kolkktbd"] = "ch";
${"GLOBALS"} ["ymgcghckqfb"] = "company";
${"GLOBALS"} ["ggwslhcoi"] = "num";
${"GLOBALS"} ["ntyskpylwc"] = "longshort";
${"GLOBALS"} ["eyqhjkz"] = "diff";
${"GLOBALS"} ["blciqqxy"] = "val";
${"GLOBALS"} ["jcotmf"] = "relative";
${"GLOBALS"} ["lgwxgtgnwtkn"] = "license";
${"GLOBALS"} ["xgbzsjmxcoyt"] = "version_latest";
${"GLOBALS"} ["gdyhnejj"] = "r2";
${"GLOBALS"} ["bnvkhrqntkot"] = "q2";
${"GLOBALS"} ["pcduvyxiwo"] = "r";
${"GLOBALS"} ["iooiakqpx"] = "ip";
${"GLOBALS"} ["rlxeekdfn"] = "parts";
${"GLOBALS"} ["cxumncw"] = "row";
${"GLOBALS"} ["gcboyjyrfqga"] = "q";
${"GLOBALS"} ["vwfjlefrus"] = "mysqli";
$lpmdomiyk = "r";
${"GLOBALS"} ["ubuvnblrgtt"] = "charset";
${"GLOBALS"} ["bjtmbay"] = "dbUser";
${"GLOBALS"} ["yakohbsfegp"] = "dbName";
${"GLOBALS"} ["sitctidt"] = "dbPass";
$hjsbnixcjfy = "r";
${"GLOBALS"} ["dpsxxeljxkpf"] = "q";
${"GLOBALS"} ["apwcmnpcb"] = "dbHost";
ini_set ( "display_errors", 0 );
session_start ();
include ("config.php");
include ("helpers/locale.php");
function dbConnect() {
	$bnaeehresq = "mysqli";
	global $mysqli;
	global $dbHost;
	global $dbUser;
	$eqnmpnyugz = "mysqli";
	$wcjxjeiwr = "dbHost";
	$awttjs = "dbPort";
	$xbfahefvxju = "mysqli";
	${"GLOBALS"} ["lgyrerff"] = "dbUser";
	$ykclbopokzt = "charset";
	global $dbPass;
	global $dbName;
	$wpuvecsndjl = "dbPort";
	if (isset ( ${$wpuvecsndjl} ))
		${$xbfahefvxju} = new mysqli ( ${${"GLOBALS"} ["apwcmnpcb"]}, ${${"GLOBALS"} ["lgyrerff"]}, ${${"GLOBALS"} ["sitctidt"]}, ${${"GLOBALS"} ["yakohbsfegp"]}, ${$awttjs} );
	else
		${$eqnmpnyugz} = new mysqli ( ${$wcjxjeiwr}, ${${"GLOBALS"} ["bjtmbay"]}, ${${"GLOBALS"} ["sitctidt"]}, ${${"GLOBALS"} ["yakohbsfegp"]} );
	if ($mysqli->connect_error) {
		fail ( "
    	<!DOCTYPE html>
        <html>
        <head>
        <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
        <link rel='Shortcut Icon' type='image/ico' href='/img/favicon.png'>
        <title>
        " . _ ( "Can't connect to database" ) . "</title>
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
        <div id=\"wrapper\"><p><
        h2>
        " . _ ( "Can't connect to database" ) . "<
        /h2>
        </p><p>" . _ ( "There is a problem connecting to the database. Please try again later." ) . "</p></div><
        /body>
        </html>
        " );
	}
	global $charset;
	mysqli_set_charset ( ${$bnaeehresq}, isset ( ${$ykclbopokzt} ) ? ${${"GLOBALS"} ["ubuvnblrgtt"]} : "utf8" );
	return ${${"GLOBALS"} ["vwfjlefrus"]};
}
function fail($errorMsg) {
	${"GLOBALS"} ["tyokkkgikg"] = "errorMsg";
	echo ${${"GLOBALS"} ["tyokkkgikg"]};
	exit ();
}
dbConnect ();
${${"GLOBALS"} ["gcboyjyrfqga"]} = "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$dbName' AND (table_name = 'apps' OR 
		table_name = 'campaigns' OR table_name = 'links' OR table_name = 'lists' OR table_name = 'login' 
		OR table_name = 'subscribers')";
${$lpmdomiyk} = mysqli_query ( ${${"GLOBALS"} ["vwfjlefrus"]}, ${${"GLOBALS"} ["dpsxxeljxkpf"]} );
if (${$hjsbnixcjfy}) {
	$irpowwemxn = "r";
	while ( ${${"GLOBALS"} ["cxumncw"]} = mysqli_fetch_array ( ${$irpowwemxn} ) ) {
		${"GLOBALS"} ["jyurtjhhvk"] = "row";
		$llcjeqhgqb = "table_count";
		$ipehjrkq = "table_count";
		${$llcjeqhgqb} = ${${"GLOBALS"} ["jyurtjhhvk"]} ["COUNT(*)"];
		if (${$ipehjrkq} != 6) {
			if (currentPage () != "_install.php") {
				header ( "Location: " . get_app_info ( "path" ) . "/_install.php" );
				exit ();
			}
		}
	}
}
include ("update.php");
$_SESSION ["company"] = "";
$_SESSION ["is_sub_user"] = "";
function unlog_session() {
	session_destroy ();
	if (setcookie ( "logged_in", "", time () - 60000, "/", COOKIE_DOMAIN ))
		return true;
}
function currentPage() {
	$efbcedldvd = "currentFile";
	$vdvysxcnrd = "currentFile";
	$ovlikoqnxji = "parts";
	${$efbcedldvd} = $_SERVER ["PHP_SELF"];
	${${"GLOBALS"} ["rlxeekdfn"]} = Explode ( "/", ${$vdvysxcnrd} );
	return ${$ovlikoqnxji} [count ( ${${"GLOBALS"} ["rlxeekdfn"]} ) - 1];
}
function ipaddress() {
	$ztwixridfn = "ip";
	if (getenv ( "HTTP_CLIENT_IP" )) {
		$eunieytxg = "ip";
		${$eunieytxg} = getenv ( "HTTP_CLIENT_IP" );
	} elseif (getenv ( "HTTP_X_FORWARDED_FOR" )) {
		${"GLOBALS"} ["dsrxaf"] = "ip";
		${${"GLOBALS"} ["dsrxaf"]} = getenv ( "HTTP_X_FORWARDED_FOR" );
	} else {
		${${"GLOBALS"} ["iooiakqpx"]} = getenv ( "REMOTE_ADDR" );
	}
	return ${$ztwixridfn};
}
function start_app() {
	$lvokqixlkrl = "r";
	global $mysqli;
	$zrwtemsvud = "q2";
	${"GLOBALS"} ["muoofqxhtj"] = "mysqli";
	${"GLOBALS"} ["xjtuaag"] = "q";
	${${"GLOBALS"} ["xjtuaag"]} = "SELECT * FROM login WHERE id = " . $_SESSION ["userID"];
	$uwejxbzvcuc = "r";
	$ochgift = "r2";
	${$uwejxbzvcuc} = mysqli_query ( ${${"GLOBALS"} ["vwfjlefrus"]}, ${${"GLOBALS"} ["gcboyjyrfqga"] } );
	${"GLOBALS"} ["yevqcsedlt"] = "r2";
	if (${${"GLOBALS"} ["pcduvyxiwo"]} && mysqli_num_rows ( ${$lvokqixlkrl} ) > 0) {
		$ghorkiz = "r";
		while ( ${${"GLOBALS"} ["cxumncw"]} = mysqli_fetch_array ( ${$ghorkiz} ) ) {
			${"GLOBALS"} ["vpsagnjuk"] = "row";
			$fhxdggl = "row";
			${"GLOBALS"} ["kwbuokl"] = "row";
			$_SESSION ["name"] = stripslashes ( ${${"GLOBALS"} ["vpsagnjuk"]} ["name"] );
			$_SESSION ["company"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["company"] );
			$_SESSION ["email"] = stripslashes ( ${${"GLOBALS"} ["kwbuokl"]} ["username"] );
			${"GLOBALS"} ["jcpbowveyil"] = "row";
			$_SESSION ["password"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["password"] );
			$_SESSION ["s3_key"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["s3_key"] );
			$_SESSION ["s3_secret"] = stripslashes ( ${${"GLOBALS"} ["jcpbowveyil"]} ["s3_secret"] );
			$_SESSION ["license"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["license"] );
			$egjcoqmlhs = "row";
			$_SESSION ["tied_to"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["tied_to"] );
			$_SESSION ["restricted_to_app"] = stripslashes ( ${$fhxdggl} ["app"] );
			$_SESSION ["timezone"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["timezone"] );
			$_SESSION ["language"] = stripslashes ( ${$egjcoqmlhs} ["language"] );
			$_SESSION ["cron"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["cron"] );
			if ($_SESSION ["timezone"] == "")
				$_SESSION ["timezone"] = date_default_timezone_get ();
			date_default_timezone_set ( $_SESSION ["timezone"] );
			if ($_SESSION ["language"] != "en_US")
				set_locale ( $_SESSION ["language"] );
			if ($_SESSION ["tied_to"] != "") {
				$muincre = "q";
				$bqeklftyj = "r";
				$qbozncbepqys = "mysqli";
				${$muincre} = "SELECT s3_key, s3_secret, license FROM login WHERE id = " . $_SESSION ["tied_to"];
				${${"GLOBALS"} ["pcduvyxiwo"]} = mysqli_query ( ${$qbozncbepqys}, ${${"GLOBALS"} ["gcboyjyrfqga"]} );
				if (${$bqeklftyj} && mysqli_num_rows ( ${${"GLOBALS"} ["pcduvyxiwo"]} ) > 0) {
					${"GLOBALS"} ["eolgsxpxqzt"] = "r";
					while ( ${${"GLOBALS"} ["cxumncw"]} = mysqli_fetch_array ( ${${"GLOBALS"} ["eolgsxpxqzt"]} ) ) {
						$_SESSION ["s3_key"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["s3_key"] );
						${"GLOBALS"} ["bwuifrvoxqv"] = "row";
						$_SESSION ["s3_secret"] = stripslashes ( ${${"GLOBALS"} ["bwuifrvoxqv"]} ["s3_secret"] );
						$_SESSION ["license"] = stripslashes ( ${${"GLOBALS"} ["cxumncw"]} ["license"] );
					}
				}
				$_SESSION ["is_sub_user"] = true;
			} else {
				$_SESSION ["is_sub_user"] = false;
				$_SESSION ["tied_to"] = $_SESSION ["userID"];
			}
		}
	}
	${$zrwtemsvud} = "SELECT api_key FROM login ORDER BY id ASC LIMIT 1";
	${$ochgift} = mysqli_query ( ${${"GLOBALS"} ["muoofqxhtj"]}, ${${"GLOBALS"} ["bnvkhrqntkot"]} );
	if (${${"GLOBALS"} ["gdyhnejj"]} && mysqli_num_rows ( ${${"GLOBALS"} ["yevqcsedlt"]} ) > 0) {
		$qlhijtkz = "row";
		while ( ${$qlhijtkz} = mysqli_fetch_array ( ${${"GLOBALS"} ["gdyhnejj"]} ) )
			$_SESSION ["api_key"] = ${${"GLOBALS"} ["cxumncw"]} ["api_key"];
	}
	/*
	if (! isset ( $_COOKIE ["version"] )) {
		$efjaxiidsfyt = "version_latest";
		${$efjaxiidsfyt} = file_get_contents_curl ( "https://sendy.co/version-checker" );
		if (setcookie ( "version", ${${"GLOBALS"} ["xgbzsjmxcoyt"]}, time () + 86400, "/", COOKIE_DOMAIN )) {
			$_SESSION ["version_latest"] = ${${"GLOBALS"} ["xgbzsjmxcoyt"]};
		}
	} else {
		$_SESSION ["version_latest"] = $_COOKIE ["version"];
	}
	*/
	if (! defined ( "CURRENT_VERSION" ))
		define ( "CURRENT_VERSION", "1.1.7.6" );
	/*
	if (isset ( $_SESSION [$_SESSION ["license"]] )) {
		if ($_SESSION [$_SESSION ["license"]] != hash ( "sha512", $_SESSION ["license"] . "2ifQ9IppVwYdOgSJoQhKOHAUK/oPwKZy" )) {
			echo "<!DOCTYPE html>
                <html>
                <head>
                <meta http-equiv=\"Content-Type\" content=\"text/html;
                charset=utf-8\"/>
                <link rel=\"Shortcut Icon\" type=\"image/ico\" href=\"img/favicon.png\">
                <title>
                Invalid license or domain
                </title>
                </head>
                <style type=\"text/css\">
                body
                {	
                	background: #ffffff;
                    font-family: Helvetica, Arial;
                }
                #wrapper
                {
                	background: #f2f2f2;
                    width: 300px;
                    height: 110px;
                    margin: -140px 0 0 -150px;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                }
                p
                {
                	text-align: center;
                    line-height: 18px;
                    font-size: 12px;
                    padding: 0 30px;
                }
                h2
                {
                	font-weight: normal;
                    text-align: center;
                    font-size: 20px;
                    }a{color: #000;
                    }a:hover{text-decoration: none;
                }</style>
                <body>
                <div id=\"wrapper\">
                <p><h2>Invalid license or domain</h2>
                </p><p>Are you running Sendy on the domain you purchased it for?</p></div></body>
                </html>";
			unlog_session ();
			exit ();
		}
	} else {
		${${"GLOBALS"} ["lgwxgtgnwtkn"]} = file_get_contents_curl ( "https://sendy.co/gateway/" . $_SERVER ["HTTP_HOST"] . "/" . $_SESSION ["license"] . "/" . ipaddress () . "/" . str_replace ( "/", "|s|", APP_PATH ) . "/" . CURRENT_VERSION . "/" . time () . "/" );
		${"GLOBALS"} ["lihuji"] = "license";
		if (${${"GLOBALS"} ["lihuji"]})
			$_SESSION [$_SESSION ["license"]] = hash ( "sha512", $_SESSION ["license"] . "2ifQ9IppVwYdOgSJoQhKOHAUK/oPwKZy" );
		else
			$_SESSION [$_SESSION ["license"]] = "";
	}
	*/
	session_write_close ();
}
function parse_date($val, $longshort, $relative = true) {
	${"GLOBALS"} ["biopihkrsl"] = "longshort";
	if (${${"GLOBALS"} ["jcotmf"]}) {
		$krwrebc = "diff";
		$jqfywqwdaym = "diff";
		${"GLOBALS"} ["wckqfpl"] = "diff";
		$cuvikpyg = "diff";
		$ndmgnxejta = "diff";
		$tvhjdfihl = "diff";
		${"GLOBALS"} ["stuzexwnxdd"] = "diff";
		${"GLOBALS"} ["usgkkcb"] = "diff";
		${"GLOBALS"} ["eqquhynurtui"] = "diff";
		$spirpvfsqhjk = "diff";
		${$jqfywqwdaym} = time () - ${${"GLOBALS"} ["blciqqxy"]};
		if (${${"GLOBALS"} ["eyqhjkz"]} < 60)
			return ${${"GLOBALS"} ["stuzexwnxdd"]} . " sec" . plural ( ${${"GLOBALS"} ["eyqhjkz"]} ) . " ago";
		${${"GLOBALS"} ["usgkkcb"]} = round ( ${$cuvikpyg} / 60 );
		$ctagrnqofrr = "diff";
		${"GLOBALS"} ["uaoihzmsauww"] = "diff";
		${"GLOBALS"} ["ggwyvsl"] = "diff";
		if (${${"GLOBALS"} ["wckqfpl"]} < 60)
			return ${${"GLOBALS"} ["uaoihzmsauww"]} . " min" . plural ( ${$spirpvfsqhjk} ) . " ago";
		${"GLOBALS"} ["ewmbyqhosy"] = "diff";
		${${"GLOBALS"} ["eyqhjkz"]} = round ( ${${"GLOBALS"} ["eyqhjkz"]} / 60 );
		$ccemsxj = "diff";
		if (${${"GLOBALS"} ["eyqhjkz"]} < 24)
			return ${${"GLOBALS"} ["ggwyvsl"]} . " hr" . plural ( ${${"GLOBALS"} ["eyqhjkz"]} ) . " ago";
		${${"GLOBALS"} ["eyqhjkz"]} = round ( ${${"GLOBALS"} ["eyqhjkz"]} / 24 );
		if (${$tvhjdfihl} < 7)
			return ${${"GLOBALS"} ["eqquhynurtui"]} . " day" . plural ( ${$krwrebc} ) . " ago";
		${${"GLOBALS"} ["eyqhjkz"]} = round ( ${$ctagrnqofrr} / 7 );
		if (${$ccemsxj} < 4)
			return ${$ndmgnxejta} . " week" . plural ( ${${"GLOBALS"} ["ewmbyqhosy"]} ) . " ago";
	}
	if (${${"GLOBALS"} ["biopihkrsl"]} == "long") {
		$yphgsr = "val";
		return strftime ( "%a, %b %d, %Y, %I:%M%p", ${$yphgsr} );
		break;
	} else if (${${"GLOBALS"} ["ntyskpylwc"]} == "short") {
		$eftkfxat = "val";
		return strftime ( "%a, %b %d, %I:%M%p", ${$eftkfxat} );
		break;
	}
}
function plural($num) {
	if (${${"GLOBALS"} ["ggwslhcoi"]} != 1)
		return "s";
}
function company_name() {
	${"GLOBALS"} ["vyqmscvtjkj"] = "r";
	global $mysqli;
	${${"GLOBALS"} ["gcboyjyrfqga"]} = "SELECT company FROM login LIMIT 1";
	${${"GLOBALS"} ["pcduvyxiwo"]} = mysqli_query ( ${${"GLOBALS"} ["vwfjlefrus"]}, ${${"GLOBALS"} ["gcboyjyrfqga"]} );
	if (${${"GLOBALS"} ["vyqmscvtjkj"]}) {
		$wondmggry = "r";
		while ( ${${"GLOBALS"} ["cxumncw"]} = mysqli_fetch_array ( ${$wondmggry} ) ) {
			return ${${"GLOBALS"} ["ymgcghckqfb"]} = ${${"GLOBALS"} ["cxumncw"]} ["company"];
		}
	} else {
		return "Sendy";
	}
}
function file_get_contents_curl($url) {
	$ulfdrpfsyh = "ch";
	${$ulfdrpfsyh} = curl_init ();
	${"GLOBALS"} ["qesxvjfipk"] = "url";
	curl_setopt ( ${${"GLOBALS"} ["kolkktbd"]}, CURLOPT_HEADER, 0 );
	curl_setopt ( ${${"GLOBALS"} ["kolkktbd"]}, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( ${${"GLOBALS"} ["kolkktbd"]}, CURLOPT_URL, ${${"GLOBALS"} ["qesxvjfipk"]} );
	curl_setopt ( ${${"GLOBALS"} ["kolkktbd"]}, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt ( ${${"GLOBALS"} ["kolkktbd"]}, CURLOPT_SSL_VERIFYPEER, 0 );
	${"GLOBALS"} ["wtqmyuftvlp"] = "ch";
	${${"GLOBALS"} ["gjgxaieserz"]} = curl_exec ( ${${"GLOBALS"} ["wtqmyuftvlp"]} );
	curl_close ( ${${"GLOBALS"} ["kolkktbd"]} );
	return ${${"GLOBALS"} ["gjgxaieserz"]};
}
function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array()) {
	$mciyalavthi = "url";
	$jypygmrrksh = "email";
	$lzihcdmc = "url";
	${${"GLOBALS"} ["rbcfiqu"]} = "http://www.gravatar.com/avatar/";
	${"GLOBALS"} ["ghwgtdhnfuq"] = "url";
	${$lzihcdmc} .= md5 ( strtolower ( trim ( ${$jypygmrrksh} ) ) );
	${${"GLOBALS"} ["ghwgtdhnfuq"]} .= "?s=$s&d=$d&r=$r";
	if (${${"GLOBALS"} ["fbtkwhnwkfpe"]}) {
		${${"GLOBALS"} ["rbcfiqu"]} = "<img src=\"" . ${${"GLOBALS"} ["rbcfiqu"]} . "\"";
		${"GLOBALS"} ["wnjislqmqn"] = "url";
		$wqazwbcohd = "val";
		foreach ( ${${"GLOBALS"} ["niqbaxqrye"]} as ${${"GLOBALS"} ["qqiggzfni"]} => ${${"GLOBALS"} ["blciqqxy"]} )
			${${"GLOBALS"} ["rbcfiqu"]} . " " . ${${"GLOBALS"} ["qqiggzfni"]} . "=\"" . ${$wqazwbcohd} . "\"";
		${${"GLOBALS"} ["wnjislqmqn"]} .= " />";
	}
	return ${$mciyalavthi};
}
function ran_string($minlength, $maxlength, $useupper, $usespecial, $usenumbers) {
	${"GLOBALS"} ["rwgmigxs"] = "i";
	$bqexakeuu = "charset";
	$qciiucro = "charset";
	$qwsetrv = "maxlength";
	$hlnepltbfgq = "useupper";
	${"GLOBALS"} ["txqwxkn"] = "i";
	${${"GLOBALS"} ["qqiggzfni"]} = "";
	${"GLOBALS"} ["lsbqfntijryw"] = "maxlength";
	${"GLOBALS"} ["uptlhyabi"] = "length";
	${$bqexakeuu} = "abcdefghijklmnopqrstuvwxyz";
	if (${$hlnepltbfgq})
		${${"GLOBALS"} ["ubuvnblrgtt"]} .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$xeymrx = "minlength";
	$uigfcqx = "key";
	if (${${"GLOBALS"} ["hnpuasixxfi"]})
		${${"GLOBALS"} ["ubuvnblrgtt"]} .= "0123456789";
	${"GLOBALS"} ["okgntvggc"] = "charset";
	if (${${"GLOBALS"} ["uimenadkir"]})
		${${"GLOBALS"} ["ubuvnblrgtt"]} .= "~@#\$%^*()_+-={}|][";
	$kcrstkb = "key";
	if (${${"GLOBALS"} ["yecvgmxd"]} > ${$qwsetrv})
		${${"GLOBALS"} ["rvbasvpo"]} = mt_rand ( ${${"GLOBALS"} ["lsbqfntijryw"]}, ${${"GLOBALS"} ["yecvgmxd"]} );
	else
		${${"GLOBALS"} ["rvbasvpo"]} = mt_rand ( ${$xeymrx}, ${${"GLOBALS"} ["mvfvwqa"]} );
	for(${${"GLOBALS"} ["rwgmigxs"]} = 0; ${${"GLOBALS"} ["awpgmxabrxpa"]} < ${${"GLOBALS"} ["uptlhyabi"]}; ${${"GLOBALS"} ["txqwxkn"]} ++)
		${$uigfcqx} .= ${$qciiucro} [(mt_rand ( 0, (strlen ( ${${"GLOBALS"} ["okgntvggc"]} ) - 1) ))];
	return ${$kcrstkb};
}
function get_app_info($v) {
	$vbcgxds = "co";
	$cefnnbqpi = "co";
	${"GLOBALS"} ["fhfmenaif"] = "v";
	switch (${${"GLOBALS"} ["fhfmenaif"]}) {
		case "version" :
			return CURRENT_VERSION;
			break;
		case "version_latest" :
			if (isset ( $_SESSION ["version_latest"] ))
				return $_SESSION ["version_latest"];
			else
				return;
			break;
		case "cookie_domain" :
			return COOKIE_DOMAIN;
			break;
		case "path" :
			return APP_PATH;
			break;
		case "s3_key" :
			if (isset ( $_SESSION ["s3_key"] ))
				return $_SESSION ["s3_key"];
			else
				return;
			break;
		case "s3_secret" :
			if (isset ( $_SESSION ["s3_secret"] ))
				return $_SESSION ["s3_secret"];
			else
				return;
			break;
		case "app" :
			if (isset ( $_GET ["i"] ))
				return $_GET ["i"];
			else
				return;
			break;
		case "userID" :
			if (isset ( $_SESSION ["userID"] ))
				return $_SESSION ["userID"];
			else
				return;
			break;
		case "name" :
			if (isset ( $_SESSION ["name"] ))
				return $_SESSION ["name"];
			else
				return;
			break;
		case "company" :
			if (isset ( $_SESSION ["company"] ))
				${$vbcgxds} = $_SESSION ["company"];
			else
				${${"GLOBALS"} ["ehyvrccm"]} = "";
			if (${$cefnnbqpi} == "")
				return company_name ();
			else
				return ${${"GLOBALS"} ["ehyvrccm"]};
			break;
		case "email" :
			if (isset ( $_SESSION ["email"] ))
				return $_SESSION ["email"];
			else
				return;
			break;
		case "password" :
			if (isset ( $_SESSION ["password"] ))
				return $_SESSION ["password"];
			else
				return;
			break;
		case "api_key" :
			if (isset ( $_SESSION ["api_key"] ))
				return $_SESSION ["api_key"];
			else
				return;
			break;
		case "license" :
			if (isset ( $_SESSION ["license"] ))
				return $_SESSION ["license"];
			else
				return;
			break;
		case "is_sub_user" :
			if (isset ( $_SESSION ["is_sub_user"] ))
				return $_SESSION ["is_sub_user"];
			else
				return;
			break;
		case "main_userID" :
			if (isset ( $_SESSION ["tied_to"] ))
				return $_SESSION ["tied_to"];
			else
				return;
			break;
		case "restricted_to_app" :
			if (isset ( $_SESSION ["restricted_to_app"] ))
				return $_SESSION ["restricted_to_app"];
			else
				return;
			break;
		case "timezone" :
			if (isset ( $_SESSION ["timezone"] ))
				return $_SESSION ["timezone"];
			else
				return;
			break;
		case "language" :
			if (isset ( $_SESSION ["language"] ))
				return $_SESSION ["language"];
			else
				return;
			break;
		case "cron_sending" :
			if ($_SESSION ["cron"] == 1)
				return true;
			else
				return false;
			break;
	}
}
?>