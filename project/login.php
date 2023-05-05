<?php 
include("Header2.php");
?>
<!DOCTYPE html>

<html>
  <head>
    <title> Log In </title>
	<style>

    </style>
	<link rel="stylesheet" href="style.css">
	<script src="lang.js"></script>
  </head>
  <body style="background-color: #FDEBD0;">
	<br><br>
	<div class="form-container">
	  <h2 id="0">Log In</h2>
	  <script>
		var t = getText(0 + <?php echo $_SESSION['lang'];?>);
		document.getElementById("0").innerHTML = t;
	  </script>
	  <form method="POST" action="login_process.php">
		<div class="form-group">
		  <label id="1" for="name">User:</label>
		  <script>
			var t = getText(1 + <?php echo $_SESSION['lang'];?>);
			document.getElementById("1").innerHTML = t;
		  </script>
		  <input type="text" name="userid" = "userid" required>
		</div>
		<div class="form-group">
		  <label id="2" for="password">Password:</label>
		  <script>
			var t = getText(2 + <?php echo $_SESSION['lang'];?>);
			document.getElementById("2").innerHTML = t;
		  </script>
		  <input type="password" name="password" = "password" required>
		</div>
		<div class="form-group">
			<label id="3" for="role">Role:</label>
		    <script>
			  var t = getText(3 + <?php echo $_SESSION['lang'];?>);
			  document.getElementById("3").innerHTML = t;
		    </script>
			<input type="text" name="role" = "role" required>
		</div>
		<br>
		<br>
		<div class="form-group">
		  <button id="4" type="submit">Log In</button>
		  <script>
		    var t = getText(0 + <?php echo $_SESSION['lang'];?>);
		    document.getElementById("4").innerHTML = t;
		  </script>
		</div>
	  </form>
	</div>
	<a id="5" href="signup.php" class="button">Click here to create a new account</a>
	<script>
	  var t = getText(4 + <?php echo $_SESSION['lang'];?>);
	  document.getElementById("5").innerHTML = t;
    </script>
  </body>
</html>
