<?php
session_start(); 
include("db_connection.php"); 
include ("Header.php"); 
?>

<html>
<body style="background-color:#FFF8DC;">

<div>
  <h1>Add a user</h1>
  <a href="signup.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
<div>
  <h1>Delete a user</h1>
    <a href="delete_user.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
<div>
  <h1> Change user information </h1>
  <a href="change_user_information.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
</html>
</body>
