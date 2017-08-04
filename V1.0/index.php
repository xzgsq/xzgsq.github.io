<?php
$install=fopen("include/install.txt","r");
fclose($install);
if(!$install){
	Header("Location:install.php");
	}?>
<html>
<head>
<script src="count.js"></script>
<title>404 Not Found</title>
</head>
<body>
<h1>Not Found</h1>
<p>The requested URL /dsd.php was not found on this server.</p>
</body>
</html>

