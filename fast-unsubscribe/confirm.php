<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Final Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap2/css/bootstrap.css" rel="stylesheet">
    <style>
      html,
      body {
        margin:0;
        padding:0;        
        padding-top: 30px;
      }
      #main-content {
        padding:10px;
        padding-bottom:120px;   /* Height of the footer element */
      }
    </style>
    <link href="bootstrap2/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->  
  </head>

  <body>
  <div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top" id="main-header">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">Success</a>
          <div class="nav-collapse collapse">

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<?
//processing
$allEmailIds = $_POST['hidden1'];
$name = $_POST['hidden2'];
$email = $_POST['hidden3'];
$phone = $_POST['hidden4'];

include("config.php");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* create a prepared statement */
$stmt = $db->prepare("INSERT into unsubscriberequests (name,email,phone,idstounsubscribe,status) VALUES(?,?,?,?,?)");
$stmt->bindParam(1,$name);
$stmt->bindParam(2,$email);
$stmt->bindParam(3,$phone);
$stmt->bindParam(4,$allEmailIds);
$stmt->bindValue(5,0);

/* execute query */
$stmt->execute();

?>

    <div class="container" id="main-content">

		<div class="row">
			<div class="span9">
      			<h4>
<?
if($stmt->errorCode() == 0)
{
  echo "The request is successfully registered. Request id is #".$db->lastInsertId().". The emails will be soon unsubscribed.";
}
else
{
  $errors = $stmt->errorInfo();
  echo "SQL Error code- ".$errors[1].". Message-".$errors[2];
}
?>
				</h4>    
			</div> <!-- .span9 -->
		</div>
    </div> <!-- /container -->
  </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap2/js/jquery-1.10.2.js"></script>
    <script src="bootstrap2/js/bootstrap.min.js"></script>
  </body>
</html>





