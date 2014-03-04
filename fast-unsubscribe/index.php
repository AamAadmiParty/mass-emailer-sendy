<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Unsubscription form</title>
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
          <a class="brand" href="#">Unsubscription form</a>
          <div class="nav-collapse collapse">

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    
    <div class="container" id="main-content">

		<div class="row">
			<div class="span9">

				<form class="form-horizontal" id="form1" accept-charset="utf-8" method="POST" action="unsubscribe.php">

          <div class="control-group">
              <label class="control-label" for="input4">Name*</label>
              <div class="controls">
                  <input type="text" name="input4" id="input4" placeholder="Your Name" />
              </div>
          </div>
          <div class="control-group">
              <label class="control-label" for="input5">Email*</label>
              <div class="controls">
                  <input type="text" name="input5" id="input5" placeholder="Your Email" />
              </div>
          </div>
          <div class="control-group">
              <label class="control-label" for="input6">Phone*</label>
              <div class="controls">
                  <input type="text" name="input6" id="input6" placeholder="Your Phone number" />
              </div>
          </div>
          <div class="control-group">
            <label for="textarea1" class="control-label">Paste emails to be unsubscribe:</label>
            <div class="controls">
              <textarea class="span6" id="textarea1" name="textarea1" rows="10" placeholder="Paste the emails seperated by comma or a new line."></textarea>
            </div>
          </div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" id="submit1">Unsubscribe</button>
            <a href="#modal1" role="button" class="btn" data-toggle="modal" id="anchor6">Submit Feedback</a>
					</div>
				</form>
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