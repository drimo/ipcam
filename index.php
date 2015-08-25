<html>
	<head>
		<title>IP Cam</title>
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
		
		<img src='<? echo $latest_filename ?>'/>
		</br>
		<? echo $latest_filename; ?> 
 </body>
</html>