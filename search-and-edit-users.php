<?php include('includes/header.php');?>
<?php include('includes/login/auth.php');?>
<?php include('includes/subscribers/main.php');?>
<?php include('includes/helpers/short.php');?>
<?php
	$manual_log = "::::MANUAL:::: ";
	
	//vars
	if(isset($_GET['s'])) $s = $_GET['s'];
	else $s = '';

?>
<div class="row-fluid">
    <div class="span2">
        <?php include('includes/sidebar.php');?>
    </div> 
    <div class="span10">
    	<h2><?php echo _('Search and Edit Users');?></h2> <br/>

		<form class="form-search" action="<?php echo get_app_info('path');?>/search-and-edit-users" method="GET" style="float:left;">
    		<input type="hidden" name="i" value="<?php echo get_app_info('app');?>">
			<input type="text" class="input-medium search-query" name="s" value="<?php echo $s;?>">
			<button type="submit" class="btn"><i class="icon-search"></i> <?php echo _('Search');?></button>
		</form>
    	
    	<br/><br/>
		
	    <table class="table table-striped table-condensed responsive">
		  <tbody>
  			<tr>
			<?php 
				if($s!="")
				{
									
					$q = 'SELECT s.id sid, s.userID,s.name ,s.email,s.custom_fields,s.list,s.unsubscribed,s.bounced,s.bounce_soft,s.complaint, s.timestamp,
					s.confirmed, l.id lid, l.name lname, a.id aid, a.app_name aname
					FROM subscribers s
					JOIN lists l ON s.list = l.id
					JOIN apps a ON l.app = a.id

					WHERE (s.email like "%'.mysqli_real_escape_string($mysqli, $s).'%"
					OR s.name like "%'.mysqli_real_escape_string($mysqli, $s).'%")
					ORDER by a.id,l.id,s.id asc LIMIT 200';

					$msc=microtime(true);
					$r = mysqli_query($mysqli, $q);
					$msc=microtime(true)-$msc;
					error_log($manual_log."MYSQL Time Taken: $msc secs");
					$all_rows = array();					
					while ($row = mysqli_fetch_assoc($r)) {
					  $all_rows[] = $row;
					}

					$array_thisbrand = array();
					$array_otherbrands = array();
					foreach ($all_rows as $row) 
					{
						if($row['aid'] == get_app_info('app'))
							array_push($array_thisbrand, $row);
						else
							array_push($array_otherbrands, $row);
					}

					function printrowheader()
					{
					?>
					  
					    <tr>
					      <th><?php echo _('');?></th>
					      <th><?php echo _('Name');?></th>
					      <th><?php echo _('Email');?></th>
					      <th><?php echo _('Brand');?></th>
					      <th><?php echo _('List');?></th>
					      <th><?php echo _('Last activity');?></th>
					      <th><?php echo _('Status');?></th>
					      <th><?php echo _('Delete');?></th>
					    </tr>
					  
					  <?
					}
					
					function printrow($row)
					{
			  			$id = $row['sid'];
			  			$name = stripslashes($row['name']);
			  			$email = stripslashes($row['email']);
			  			$brand = stripslashes($row['aname']);
			  			$list = stripslashes($row['lname']);
				    	$unsubscribed = $row['unsubscribed'];
			  			$bounced = $row['bounced'];
			  			$complaint = $row['complaint'];
			  			$confirmed = $row['confirmed'];
			  			$timestamp = parse_date($row['timestamp'], 'short', true);

			  			if($unsubscribed==0)
			  				$unsubscribed = '<a href="javascript:void(0)" id="subscription-'.$id.'" class="subscription label label-success" data-action="unsubscribe" title="Unsubscribe '.$email.'">'._('Subscribed').'</a>';
			  			else if($unsubscribed==1)
			  				$unsubscribed = '<a href="javascript:void(0)" id="subscription-'.$id.'" class="subscription label label-important" data-action="resubscribe" title="Resubscribe '.$email.'">'._('Unsubscribed').'</a>';
						if($bounced==1)
			  				$unsubscribed = '<a href="javascript:void(0)" id="subscription-'.$id.'" class="label label-warning" data-action="" title="Nothing can be done about it">'._('Bounced').'</a>';
			  			if($complaint==1)
			  				$unsubscribed = '<a href="javascript:void(0)" id="subscription-'.$id.'" class="label label-warning" data-action="" title="Nothing can be done about it">'._('Marked as spam').'</a>';
			  			if($confirmed==0)
			  				$unsubscribed = '<a href="javascript:void(0)" id="subscription-'.$id.'" class="subscription label" data-action="confirm" title="Confirm '.$email.'">'._('Unconfirmed').'</a>';

			  			$delete = '<a href="javascript:void(0)" title="Delete '.$email.'?" id="delete-'.$id.'" data-email="'.$email.'" class="delete-subscriber"><i class="icon icon-trash"></i></a>'
				    	?>
				    	<tr id="row-<?echo $id;?>">
						<td><input type="checkbox" id="" name="rows_to_edit[<?echo $id;?>]" class="multi_checkbox checkall" value=""></td>
						<td class="edit" id="name-<?echo $id;?>"><?php echo $name;?></td>
						<td class="edit" id="email-<?echo $id;?>"><?php echo $email;?></td>
						<td><?php echo $brand;?></td>
						<td><?php echo $list;?></td>
						<td><?php echo $timestamp;?></td>
						<td><?php echo $unsubscribed;?></td>
						<td><?php echo $delete;?></td>
						</tr>
						<?php

					}
					if(count($array_thisbrand)>0)
					{
						?><tr><td colspan="8"><br><h2><?echo count($array_thisbrand)?> Results found in <?echo get_app_data('app_name')?><h2></td></tr><?
						printrowheader();
						foreach ($array_thisbrand as $row) {
							printrow($row);
						}
						
					}
					if(count($array_otherbrands)>0)
					{
						?><tr><td colspan="8"><br><h2><?echo count($array_otherbrands)?> Results also found in Other Brands<h2></td></tr><?
						foreach ($array_otherbrands as $row) {
							printrow($row);
						}
					}
					if(count($array_thisbrand)==0 && count($array_otherbrands)==0)
					{
						?>
						<tr>
		  				<td colspan="8">No subscribers found.</td>
		  				</tr>
						<?php

					}


				}
				else
				{
					?>
					<tr>
	  				<td>No subscribers found.</td>
	  				</tr>
					<?php
				}

			?>
  			</tr>
		    
		  </tbody>
		</table>
		
		<?php pagination($limit);?>
    </div>   
</div>
<script>
$(document).ready(function() {
	$('.edit').editable('search-and-edit-save.php',{
         indicator : 'Saving...',
         tooltip   : 'Click to edit...',
         onblur	   : 'submit'
     });

    $(".subscription").click(function(event) {
    	elem = $(event.target);
        action = elem.data("action");
        elem_id = elem.prop('id');
        subscriber_id = elem_id.split('-')[1];
        $.post("includes/subscribers/unsubscribe.php", { subscriber_id: subscriber_id, action: action},
		function(data) {
		  if(data)
		  {
		  	if(elem.text().trim()=='Subscribed')
		  	{
		  		elem.data("action", "resubscribe");
		  		elem.text("Unsubscribed").removeClass("label-success").addClass("label-important");
		  		title = elem.attr('data-original-title');
		  		elem.attr("data-original-title", title.replace("Unsubscribe", "Resubscribe"));
		    }
		    else
		    {
		  		elem.data("action", "unsubscribe");
		  		elem.text("Subscribed").removeClass("label-important").addClass("label-success");
		  		title = elem.attr('data-original-title');
		  		elem.attr("data-original-title", title.replace("Resubscribe", "Unsubscribe").replace("Confirm", "Unsubscribe"));
		    }
		  }
		  else
		  {
		  	alert("Sorry, unable to unsubscribe. Please try again later!");
		  }
		});
    });
	$(".delete-subscriber").click(function(e){
		e.preventDefault();
    	elem = $(e.target);
    	email = elem.parent().data("email");
        elem_id = elem.parent().prop('id');
        subscriber_id = elem_id.split('-')[1];
        console.log(elem);
        console.log(email);
        console.log(subscriber_id);

		c = confirm("Confirm delete "+email+"?");
		if(c)
		{
			$.post("includes/subscribers/delete.php", { subscriber_id: subscriber_id },
			  function(data) {
			  		console.log(data);
			      if(data)
			      {
			      	$("#row-"+subscriber_id).fadeOut();
			      }
			      else
			      {
			      	alert("Sorry, unable to delete. Please try again later!");
			      }
			  }
			);
		}
	});

});
</script>


<?php include('includes/footer.php');?>
