<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Confirmation Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap2/css/bootstrap.css" rel="stylesheet">
    <link href="google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
    <link href="bootstrap2/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/customcss.css" rel="stylesheet">

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
          <a class="brand" href="#">Confirmation Page</a>
          <div class="nav-collapse collapse">

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<?
include("config.php");
//processing
$name = $_POST['input4'];
$email = $_POST['input5'];
$phone = $_POST['input6'];
$emailsTU = $_POST['textarea1'];
$emails_array = array_filter(array_map('trim', preg_split("/[\r\n,]+/", $emailsTU, -1, PREG_SPLIT_NO_EMPTY)));
$emails_array_comma_seperated = implode(",", $emails_array);
$results = Array();
if(count($emails_array)>0)
{
  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  /* create a prepared statement */
  $params = implode(",", array_fill(0, count($emails_array), "?"));
  $stmt = $db->prepare("SELECT s.id, s.name,s.email,l.name listname FROM subscribers s join lists l on s.list = l.id WHERE s.email in ($params)");

  /* bind parameters for markers */
  foreach ($emails_array as $k => $e)
  {
    $stmt->bindValue(($k+1), $e);
  }

  /* execute query */
  $stmt->execute();

  /* fetch value */
  
  if($stmt->errorCode() == 0)
  {
    $results = $stmt->fetchAll();
  }
  else
  {
    $errors = $stmt->errorInfo();
    echo "SQL Error code- ".$errors[1].". Message-".$errors[2];
  }
  if(count($results)>0)
    $allEmailIds = implode(",", array_map(function($el){return $el['id'];}, $results));
}
?>

    <div class="container" id="main-content">

		<div class="row">
			<div class="span9">
      <? if(count($emails_array)>0 && count($results)>0) { ?>
      <h4>Following emails were found:</h4>
        <form class="form-horizontal" id="form2" accept-charset="utf-8" method="POST" action="confirm.php">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>List</th>
              </tr>
            </thead>
            <tbody>
            <?
              foreach($results as $k=>$row)
              {
              echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['listname']."</td>
                  </tr>";
            
               }
            ?>
            </tbody>
          </table>
        
        <h4>Click confirm to request unsubscription for above users. Your Name (<?echo $name?>) will be recorded.</h4>
        <input type="hidden" name="hidden1" value="<?=$allEmailIds?>"/>
        <input type="hidden" name="hidden2" value="<?=$name?>"/>
        <input type="hidden" name="hidden3" value="<?=$email?>"/>
        <input type="hidden" name="hidden4" value="<?=$phone?>"/>
        <input type="hidden" name="hidden5" value="<?=$emails_array_comma_seperated?>"/>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary" id="submit1">Confirm for Unsubscription</button>
            <a href="#modal1" role="button" class="btn" data-toggle="modal" id="anchor6">Submit Feedback</a>
          </div>
        </form>
        <? } else if(count($emails_array)>0){echo "<h4>None of the emails mentioned matches with any record in our database.</h4>";}
          else echo "<h4>Please enter at least one email.</h4>";
        ?>
			</div> <!-- .span8 -->

		</div>
    
    <!-- Modal -->
    <div id="modal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modallabel1" aria-hidden="true">
      <form class="form-horizontal" data-async data-target="#modal1" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modallabel1">Submit Feedback</h3>
      </div>
      <div class="modal-body">
      <!-- The async form to send and replace the modals content with its response -->
      
        <fieldset>
          <!-- <input name="type" type="hidden" value="add_outcome" /> -->
          <div class="control-group">
              <label class="control-label" for="input13">Name</label>
              <div class="controls">
                  <input type="text" name="input13" id="input13" placeholder="Your name" />
              </div>
          </div>
          <div class="control-group">
              <label class="control-label" for="input14">Email</label>
              <div class="controls">
                  <input type="text" name="input14" id="input14" placeholder="Your email" />
              </div>
          </div>
          <div class="control-group">
              <label class="control-label" for="input15">Phone</label>
              <div class="controls">
                  <input type="text" name="input15" id="input15" placeholder="Your phone" />
              </div>
          </div>
          <div class="control-group">
              <label class="control-label" for="select1">Topic</label>
              <div class="controls">
                  <select name="select1" id="select1" class="form-control" style="width: 290px;">
                  <option value="bug report">Report a Bug</option>
                  <option value="suggestion feedback">Suggestion or Feedback</option>
                  <option value="others">Others</option>
              </select>
              </div>
          </div>
          <div class="control-group">
              <label class="control-label" for="textarea2">Feedback</label>
              <div class="controls">
                  <textarea id="textarea2" name="textarea2" rows="7" placeholder="Please report bugs, provide feedback or suggestions." class="input-xlarge"></textarea>
              </div>
          </div>
        </fieldset>
      
      </div>
        <div class="alert alert-info" id="alert2" style="display: none;">
            <a href="#" class="close" onclick="$('#alert2').hide()">&times;</a>
            .
        </div>      
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        <img src="assets/images/ajax-loader.gif" id="loading-indicator" style="display:none" />
      </div>
      </form>
    </div>
    </div> <!-- /container -->
  </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap2/js/jquery-1.10.2.js"></script>
    <script src="bootstrap2/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/customjs.js"></script>
  </body>
</html>