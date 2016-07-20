<?php
	
	$preview = 1;
	
	//set the user id
	$_SESSION['user_id'] = 1;
	
	//connect to the db
	$link = @mysql_connect('10.94.130.36','ios_new','provi');
	@mysql_select_db('blog',$link);
	
	/* form submission post */
	if(isset($_POST['status']) && $_SESSION['user_id'])
	{
		//record the occurence
		$query = 'INSERT INTO test (user_id, status, date_set)  VALUES ('.$_SESSION['user_id'].',\''.mysql_escape_string(htmlentities(strip_tags($_POST['status']))).'\',NOW())';
		$result = @mysql_query($query,$link);
		
		//die if this was done via ajax...
		if($_POST['ajax']) { die(); } else { $message = 'Status Updated!'; }
	}
	
?>
<?php include('example-page/doctype.php'); ?>
	<title><?php echo $source_article; ?> Example</title>
	<meta name="description" content="<?php echo htmlentities($meta_description); ?>" />
	<?php include('example-page/css.php'); ?>
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
	<script type="text/javascript" src="../../../scripts/mootools-core-1.4.5-full-compat.js"></script>
<script type="text/javascript" src="../../../scripts/mootools-more-1.4.0.1.js">
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
	<script type="text/javascript" src="/wp-content/themes/david-walsh-2/shCore.js"></script>
	<script type="text/javascript" src="/wp-content/themes/david-walsh-2/shBrushes.js"></script>
	<script type="text/javascript">/* do all ondomready events */window.addEvent('domready',function() {/* syntax highlighting -- highlight the code */dp.SyntaxHighlighter.ClipboardSwf = 'http://davidwalsh.name/wp-content/themes/david-walsh-2/clipboard.swf';dp.SyntaxHighlighter.HighlightAll('code'); /* background image cache */try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}/* smoothscroll */new SmoothScroll({duration:500});/* searchbox */fsb = $('footer-search-box');var fsb_start = fsb.get('value');fsb.addEvents({focus: function() {if(fsb.get('value') == fsb_start){fsb.set('value','');}},blur: function() {if(fsb.get('value') == ''){fsb.set('value',fsb_start);}}});/* protect email */$$('.email').each(function(el) { el.set('href','mailto:' + el.get('href').replace('|','@').replace('/','')); });/* twitter */$('twitter').addClass('point').addEvent('click', function() { window.location = 'http://twitter.com/davidwalshblog'; });/* hide "related posts when none */if($('rel-po')){if($('rel-po').get('text').trim() == ''){$('rel-po').setStyle('display','none');}}/* accordion */window.addEvent('domready', function() {  var accordion = new Accordion($$('.toggler'),$$('.toggler-content'), {  opacity: 0,onActive: function(toggler) { toggler.setStyle('color', '#090'); },  onBackground: function(toggler) { toggler.setStyle('color', '#000'); },alwaysHide: 1});  });});/* comment post */function validate_post(){if(($('author') && !$('author').value) || ($('email') && !$('email').value) || !$('comment').value){$('form-error-message').set('html','Your comment is missing information -- please complete it!').setStyle('display','block');return 0;}else{$('form-error-message').setStyle('display','none'); $('submit').disabled = 1; return 1;}}</script><link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://davidwalsh.name/xmlrpc.php?rsd" /><link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://davidwalsh.name/wp-includes/wlwmanifest.xml" /> <meta name="generator" content="WordPress 2.5.1" /><!-- all in one seo pack 1.4.6.13 ob_start_detected [-1,-1] --><meta name="description" content="A Programmer's Blog that covers PHP, MySQL, CSS, Javascript, MooTools, and everything else." /><meta name="keywords" content="PHP, MySQL, CSS, XML, XHTML, programming, MooTools, javascript, david walsh, bludice, web development" /><!-- /all in one seo pack --><!-- Protected by WP-SpamFree v1.9.6.2 :: JS BEGIN --><script type="text/javascript" src="http://davidwalsh.name/wp-content/plugins/wp-spamfree/js/wpsf-js.php"></script> <!-- Protected by WP-SpamFree v1.9.6.2 :: JS END --><!-- Start Of Script Generated By WP-UserOnline 2.20 --><script type='text/javascript' src='http://davidwalsh.name/wp-includes/js/tw-sack.js?ver=1.6.1'></script><script type='text/javascript' src='http://davidwalsh.name/wp-content/plugins/useronline/useronline-js.php?ver=2.20'></script><!-- End Of Script Generated By WP-UserOnline 2.20 --></head><body id="body"><a name="top" id="top"></a><!-- HEADER --><div id="header"><div id="header2"><div id="header21"><a href="/" title="David Walsh Blog Home."><img src="/wp-content/themes/david-walsh-2/images/top-logo.gif" alt="David Walsh" style="display:block;" /></a></div><div id="header22">david walsh blog<br /><div>Become a complete programmer with<br />PHP, CSS, MooTools, jQuery, and everything else.</div></div><div id="header23"></div><div class="clear"></div></div></div><p class="accessibility">Welcome to the David Walsh Blog!  This website was created to reach every audience possible.  Please contact me at <a href="/david|davidwalsh.name" class="email">david@davidwalsh.name</a> to let me know if I can do anything to further improve your experience on this website.</p><div id="wrap"><!-- CONTENT AREA --><div id="content"><div id="top-sponsors"><b>Sponsors: </b>   <a href="http://atilus.com/services/internet-marketing/seo.html">Search Engine Optimization</a>  <a href="http://www.pricebat.com/">Shopping Online Stores</a>  <a href="http://www.datadoctor.in">free file recovery software</a>  <a href="http://www.freshtraffic.co.uk">seo</a> -  <a href="http://www.text-link-ads.com/packages.php?query=83769" target="_blank" style="color:#2a447a;">Become a sponsor...</a> - <a href="/50-off-dreamhost-hosting" style="font-weight:bold;color:#090;">$50 Off Web Hosting</a> - <a href="http://www.text-link-ads.com/?ref=126360" style="color:#090;">Monetize Your Site</a></div><div id="content-left">	
</head>
<body>
<?php include('example-page/header.php'); ?>
	
	<h3>What are you doing?</h3>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<textarea name="status" id="status"></textarea><br />
		<input type="submit" value="Update Status" id="submit" />
		<div id="message"><?php echo $message; ?></div>
	</form>
	
	<div class="clear"></div>
	<p>&nbsp;</p>
	<h3>Recent Updates</h3>
	<div id="statuses">
		<?php
			//get the latest 20
			$query  = 'SELECT status, DATE_FORMAT(date_set,\'%M %e, %Y @ %l:%i:%s %p\') AS ds FROM nettuts1 ORDER BY date_set DESC LIMIT 20';
			$result = mysql_query($query,$link) or die(mysql_error().': '.$query);
			while($row = mysql_fetch_assoc($result))
			{
				echo '<div class="status-box">',stripslashes($row['status']),'<br /><span class="time">',$row['ds'],'</span></div>';
			}
		?>
	</div>
	
	
<?php include('example-page/footer.php'); ?>
