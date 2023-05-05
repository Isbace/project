<?php
if(session_status() === PHP_SESSION_NONE) session_start();
if(!isset($_SESSION['lang']))
{
	// default english
	$_SESSION['lang']=1000;
}
if (isset($_GET["l"])){
	$_SESSION['lang']=$_GET["l"];
}
?>
<head>
</head>
<link rel="stylesheet" href="style.css">
<body>
<center>
	<header>
		<h1> Free Library</h1>
		<span style="position:realtive;float:right;">
		  <a href="?l=1000">
			<span>EN: <img src="img/~EN.png" style="width:18px;height:12px;" /></span>
		  </a>
		  <a href="?l=2000">
			<span>ES: <img src="img/~ES.png" style="width:18px;height:12px;" /></span>
		  </a>
		</span>
    </header>
<center>
</body>