<html>
	<head>
		<title>IP Cam</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<meta http-equiv="refresh" content="5">-->
		
		<!--Favicon settings-->
		<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="manifest.json">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<!--CSS-->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/ipcam.css">
	</head>
 <body>
	<?php
	
		//favicon source: https://www.iconfinder.com/icons/299109/webcam_icon#size=512
		//favicon generator: http://realfavicongenerator.net/
		//dark blue: #2b5797
		
		//m.hancock - Get the snapshot image from the camera
		//http://192.168.1.147/snapshot.cgi?user=ipcam&pwd=snapshot
		$cameraName = "Front Door";
		$url = "http://[IPADDRESS]/snapshot.cgi?user=[USERNAME]&pwd=[PASSWORD]";
		$ipAddress = "192.168.1.147";
		$userName = "ipcam";
		$password = "snapshot";
		$snapshotUrl = str_replace("[IPADDRESS]", $ipAddress, str_replace("[USERNAME]", $userName, str_replace("[PASSWORD]", $password, $url)));
	?>
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">IP Camera</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="#">Home</a></li>-->
            <!--<li><a href="#about">About</a></li>-->
            <!--<li><a href="#contact">Contact</a></li>-->
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
		<div class="row">
			<div class="camera-wrapper panel panel-primary">
				<div class="camera-header panel-heading">
					<h3 class="panel-title"><?=$cameraName;?></h3>
				</div>
				<div class="panel-body">
					<img id="imgCamera" src='<?=$snapshotUrl;?>' class="img-responsive" alt="IP Camera image" />
				</div>
				<div class="panel-footer">
					<span id="imgDate" />
				</div>
			</div>
		</div>
    </div>
	
	<footer class="footer">
      <div class="container">
        <p class="text-muted">
			Developed by <a href="mailto:matthew.d.hancock@gmail.com">Matthew Hancock</a>, 2015
		</p>
      </div>
    </footer>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script>
		$(document).ready(function() {
			//m.hancock - 08/27/2015 08:17:17 AM - Automatically refresh the image using ajax.
			setDate();
			setInterval(function() {
				$('#imgCamera').attr('src', '<?=$snapshotUrl;?>');
				setDate(); 
			}, 5000);
		});
		
		function setDate() {
			var d = new Date();
			var formattedDate = d.getMonth()+1 + "/" + d.getDate() + "/" + d.getFullYear() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
			$("#imgDate").text(formattedDate);
		}
	</script>
 </body>
</html>