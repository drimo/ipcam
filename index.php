<html>
	<head>
		<title>IP Cam</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
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
		
		//m.hancock - get the latest image from the directory
		//http://stackoverflow.com/questions/1491020/php-get-the-latest-file-addition-in-a-directory
		$path = "images"; 
		
		$latest_ctime = 0;
		$latest_filename = '';    
		
		$d = dir($path);
		while (false !== ($entry = $d->read())) {
			$filepath = "{$path}/{$entry}";
			// could do also other checks than just checking whether the entry is a file
			if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
				$latest_ctime = filectime($filepath);
				$latest_filename = $entry;
			}
		}
		// now $latest_filename contains the filename of the file that changed last
		
		$latest_filename = $path . "/" . $latest_filename;
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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="camera-wrapper panel panel-primary">
					<div class="camera-header panel-heading">
						<h3 class="panel-title">Front Door</h3>
					</div>
					<div class="panel-body">
						<img src='<? echo $latest_filename ?>' class="img-responsive" alt="IP Camera image" />
					</div>
					<div class="panel-footer">
						<? echo date("m/d/Y h:i:s A", filectime($latest_filename)); ?>
					</div>
				</div>
			</div>
		</div>
    </div>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
 </body>
</html>