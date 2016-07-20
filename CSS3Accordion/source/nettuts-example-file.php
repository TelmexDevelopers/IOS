<?php
	
	//set the user id
	$_SESSION['user_id'] = 1;
	
	//connect to the db
	$link = @mysql_connect('10.94.130.36','ios_new','provi');
	@mysql_select_db('ios_new',$link);
	
	/* form submission post */
	if(isset($_POST['status']) && $_SESSION['user_id'])
	{
		//record the occurence
		$query = 'INSERT INTO test (user_id, status, date_set) VALUES ('.$_SESSION['user_id'].',\''.mysql_escape_string(htmlentities(strip_tags($_POST['status']))).'\',NOW())';
		$result = @mysql_query($query,$link);
		
		//die if this was done via ajax...
		if($_POST['ajax']) { die(); } else { $message = 'Status Updated!'; }
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Twitter Emulation</title>
	<style type="text/css">
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message		{ padding:7px 10px; float:left; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:500px; height:75px; margin:5px 0; }
		#statuses	{ width:512px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 70px; height:48px; background:url(nettuts-david.jpg) 10px 10px no-repeat; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
	</style>
	
<!--	librerias mootoools-->
<!--<script type="text/javascript" src="moo1.2.js">-->
</script>

<script type="text/javascript" src="../../../scripts/mootools-core-1.4.5-full-compat.js"></script>
<script type="text/javascript" src="../../../scripts/mootools-more-1.4.0.1.js"></script>
	<script type="text/javascript">
	
		/* when the dom is ready */
		window.addEvent('domready', function() {
			
			//create the message slider
			var fx = new Fx.Slide('message', {
				mode: 'horizontal'
			}).hide();
			
			//make the ajax call to the database to save the update
			var request = new Request({
				url: '<?php echo $_SERVER['PHP_SELF']; ?>',
				method: 'post',
				onRequest: function() {
					$('submit').disabled = 1;
				},
				onComplete: function(response) {
					$('submit').disabled = 0;
					$('message').removeClass('success').removeClass('failure');
					(function() { fx.slideOut(); }).delay(2000);
				},
				onSuccess: function() {
					//update message
					$('message').set('text','Status updated!').addClass('success');
					fx.slideIn();
					
					//store value, clear out box
					var status = $('status').value;
					$('status').value = '';
					
					//add new status to the statuses container
					var element = new Element('div', {
						'class': 'status-box',
						'html': status + '<br /><span class="time">A moment ago</span>'
					}).inject('statuses','top');
					
					//create a slider for it, slide it in.
					var slider = new Fx.Slide(element).hide().slideIn();
					
					//place the cursor in the text area
					$('status').focus();
					
				},
				onFailure: function() {
					//update message
					$('message').set('text','Status could not be updated.  Try again.').addClass('failure');
					fx.slideIn();
				}
			});
			
			//when the submit button is clicked...
			$('submit').addEvent('click', function(event) {
				
				//stop regular form submission
				event.preventDefault();
				
				//if there's anything in the textbox
				if($('status').value.length && !$('status').disabled) {
					
					request.send({
						data: {
							'status': $('status').value,
							'ajax': 1
						}
					});
					
				}
				
			});
			
		});
		
	</script>
</head>
<body>
	
	<h3>Comentarios</h3>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<textarea name="status" id="status"></textarea><br />
		<input type="submit" value="Update Status" id="submit" />
		<div id="message"><?php echo $message; ?></div>
	</form>
	
	<div class="clear"></div>
	<p>&nbsp;</p>
	<h3>Comentarios recientes</h3>
	<div id="statuses">
		<?php
			//get the latest 20
			$query  = 'SELECT status, DATE_FORMAT(date_set,\'%M %e, %Y @ %l:%i:%s %p\') AS ds FROM test ORDER BY date_set DESC LIMIT 20';
			$result = mysql_query($query,$link) or die(mysql_error().': '.$query);
			while($row = mysql_fetch_assoc($result))
			{
				echo '<div class="status-box">',stripslashes($row['status']),'<br /><span class="time">',$row['ds'],'</span></div>';
			}
		?>
	</div>
	
	
</body></html>
