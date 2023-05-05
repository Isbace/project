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
<script src="../lang.js"></script>
<body>
<center>
<header>
      <h1> Free Library</h1>
	  <li class="menu-item"><a href="#" class="drp"><img src="book1.jpg" alt="Logo" class="logo"></a>
	  <?php
	    if (!isset($_GET["id"]))
		{
			echo '<span style="position:realtive;float:right;">
			<a href="?l=1000">
			  <span>EN: <img src="../img/~EN.png" style="width:18px;height:12px;" /></span>
			</a>
			<a href="?l=2000">
			  <span>ES: <img src="../img/~ES.png" style="width:18px;height:12px;" /></span>
			</a>
		  </span>';
		}
	  ?>
	  <div class="menu-content">
		<a id="0" href="my_profile.php">Profile</a><br>
		<script>
		  var t = getText(5 + <?php echo $_SESSION['lang'];?>);
		  document.getElementById("0").innerHTML = t;
		</script>
		<a id="1" href="return_books.php">Returns</a><br>
		<script>
		  var t = getText(6 + <?php echo $_SESSION['lang'];?>);
		  document.getElementById("1").innerHTML = t;
		</script>
		<a id="2" href="../signup.php">Sign Up</a><br>
		<script>
		  var t = getText(7 + <?php echo $_SESSION['lang'];?>);
		  document.getElementById("2").innerHTML = t;
		</script>
		<a id="3" href="../login.php">Log Out</a><br>
		<script>
		  var t = getText(8 + <?php echo $_SESSION['lang'];?>);
		  document.getElementById("3").innerHTML = t;
		</script>
	  </div>
	  </li>
	 
    </header>
 <ul style="background-color: #FAD7A0;">
		<li class="menu-item"><a id="4" href="index.php" class="drp">HOME PAGE</a>
		</li>
		<script>
		  var t = getText(11 + <?php echo $_SESSION['lang'];?>);
		  document.getElementById("4").innerHTML = t;
		</script>
		<li class="menu-item"><a id="5" href="recomendations.php" class="drp">Find Books</a>	
		</li>
		<script>
		  var t = getText(12 + <?php echo $_SESSION['lang'];?>);
		  document.getElementById("5").innerHTML = t;
		</script>
		<li class="menu-item"><a id="6" href="return_books.php" class="drp">Return Books </a>	
		</li>
		<script>
		  var t = getText(13 + <?php echo $_SESSION['lang'];?>);
		  document.getElementById("6").innerHTML = t;
		</script>
	</ul>
<center>
</body>