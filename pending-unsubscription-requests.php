<?php include('includes/header.php');?>
<?php include('includes/login/auth.php');?>
<?php include('includes/subscribers/main.php');?>
<?php include('includes/helpers/short.php');?>
<?php
	
	//vars
	if(isset($_GET['s'])) $s = $_GET['s'];
	else $s = '';

?>
<div class="row-fluid">
    <div class="span2">
        <?php include('includes/sidebar.php');?>
    </div> 
    <div class="span10">
    	<h2><?php echo _('Pending Unsubscription Requests');?></h2> <br/>
		<form class="form-horizontal" id="form2" accept-charset="utf-8" method="GET" action="">
	    <table class="table table-striped table-condensed responsive">
		  <tbody>
  			<tr>
			<?php 
			
				$q = 'SELECT id, name, email, phone, idstounsubscribe, raw_emails, date_created
				FROM unsubscriberequests WHERE status = 0 Limit 200';

				$r = mysqli_query($mysqli, $q);
				$all_rows = array();					
				while ($row = mysqli_fetch_assoc($r)) {
				  $all_rows[] = $row;
				}

				function printrowheader()
				{
				?>
				  
				    <tr>
				      <th><?php echo _('<input type="checkbox" class="select_all">');?></th>
				      <th><?php echo _('Id');?></th>
				      <th><?php echo _('Volunteer Name');?></th>
				      <th><?php echo _('Volunteer Email');?></th>
				      <th><?php echo _('Volunteer Phone');?></th>
				      <th><?php echo _('Emails to Unsubscribe');?></th>
				      <th><?php echo _('Number of emails');?></th>
				      <th><?php echo _('Date');?></th>
				      <th><?php echo _('Status');?></th>
				    </tr>
				  
				  <?
				}
				
				function printrow($row)
				{
		  			$id = $row['id'];
		  			$name = stripslashes($row['name']);
		  			$email = stripslashes($row['email']);
		  			$phone = stripslashes($row['phone']);
		  			$raw_emails = stripslashes($row['raw_emails']);
		  			$idstounsubscribe = stripslashes($row['idstounsubscribe']);
		  			$date_created = date('d/m/y h:i:s A', strtotime($row['date_created']));
		  			$status = '<a href="javascript:void(0)" id="subscription-'.$id.'" class="label">'._('Pending').'</a>';

			    	?>
			    	<tr id="row-<?echo $id;?>" class="record_table">
					<td><input type="checkbox" id="" name="rows_to_edit[<?echo $id;?>]" class="multi_checkbox checkall" value="<?echo $idstounsubscribe?>"></td>
					<td><?php echo $id;?></td>
					<td><?php echo $name;?></td>
					<td><?php echo $email;?></td>
					<td><?php echo $phone;?></td>
					<td <?echo "title='$raw_emails\n--------------------------------\n$idstounsubscribe'"?>> <?php echo strlen($raw_emails)>20?substr($raw_emails,0,20).'...':$raw_emails;?></td>
					<td><?php echo substr_count($idstounsubscribe, ",")+1;?></td>
					<td><?php echo $date_created;?></td>
					<td><?php echo $status;?></td>
					</tr>
					<?php

				}

				if(count($all_rows)>0)				
				{
					printrowheader();
					foreach ($all_rows as $row) {
						printrow($row);
					}
					?>
					<tr>
					<td><input type="checkbox" class="select_all" id="checkbox2"></td>
					<td colspan="9"><label for="checkbox2">Select All</label></td>
					<?
				}
				else				
				{
					?>
					<tr>
	  				<td colspan="8">No pending unsubscription request.</td>
	  				</tr>
					<?php

				}


			?>
  			</tr>
		  </tbody>
		</table>	  			
        <button type="submit" class="btn btn-primary" id="submit1">Unsubscribe selected</button>      		
        <button class="btn btn-info" id="button2">Reject selected requests</button>      		
	    </form>
		
		<?php pagination($limit);?>
    </div>   
</div>
<script>

$(document).ready(function() {
	var lastChecked = null;
	var $chkboxes = $('.multi_checkbox');
	$chkboxes.click(function(e) {
	    if(!lastChecked) {
	        lastChecked = this;
	        return;
	    }

	    if(e.shiftKey) {
	        var start = $chkboxes.index(this);
	        var end = $chkboxes.index(lastChecked);

	        $chkboxes.slice(Math.min(start,end), Math.max(start,end)+ 1).attr('checked', lastChecked.checked);

	    }

	    lastChecked = this;
	});
	$('.record_table').click(function(event) {
		if (event.target.type !== 'checkbox') {
	  		$(':checkbox', this).trigger('click');
		}
	});
	$('.select_all').click(function(){
		$('.multi_checkbox, .select_all').attr('checked',this.checked);
	});

	$(".multi_checkbox").click(function(){
 
        if($(".multi_checkbox").length == $(".multi_checkbox:checked").length) {
            $(".select_all").attr("checked", "checked");
        } else {
            $(".select_all").removeAttr("checked");
        }
 
    });

    $("#form2").submit(function(event) {
    	event.preventDefault();
    	
    	var data_to_send = {'ids_to_send[]':[],'action':"approve"};
        if($(".multi_checkbox:checked").length>0)
        {
	        $(".multi_checkbox:checked").each(function(){
	        	req_id = $(this).parent().parent().prop('id').split('-')[1];
	        	payload = $(this).val();
	        	data_to_send['ids_to_send[]'].push(req_id+"--"+payload);
	        });
	        console.log(data_to_send);
	        $.post("includes/subscribers/manual-unsubscribe.php", data_to_send)
				.done(function(data) {
					success_ids = data.split(',');
					for(var i in success_ids)
					{
						$('#subscription-'+success_ids[i]).text("Unsubscribed").removeClass("label-important").addClass("label-success");
					}
				});
		}
		else
		{
			alert("select at least one request");
		}
    });
    $("#button2").click(function(event) {
    	event.preventDefault();
    	
    	var data_to_send = {'ids_to_send[]':[],'action':"reject"};
        if($(".multi_checkbox:checked").length>0)
        {
	        $(".multi_checkbox:checked").each(function(){
	        	req_id = $(this).parent().parent().prop('id').split('-')[1];
	        	payload = $(this).val();
	        	data_to_send['ids_to_send[]'].push(req_id+"--"+payload);
	        });
	        console.log(data_to_send);
	        $.post("includes/subscribers/manual-unsubscribe.php", data_to_send)
				.done(function(data) {
					success_ids = data.split(',');
					for(var i in success_ids)
					{
						$('#subscription-'+success_ids[i]).text("Rejected").removeClass("label-success").addClass("label-important");
					}
				});
		}
		else
		{
			alert("select at least one request");
		}
    });


});
</script>


<?php include('includes/footer.php');?>
