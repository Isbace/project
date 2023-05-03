<?php
include("db_connection.php"); 
$user=($_SESSION['userid']);
?>

<html>
<body>

<div>
  <h1>Users</h1>
  <a href="users.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
<div>
  <h1>Books</h1>
    <a href="books.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
<div>
  <h1> Add/Change/Delete Users </h1>
  <a href="users_options.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>

<hr />
<div>
  <h1> Add/Change/Delete Books </h1>
  <a href="books_options.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
<div>
  <h1> Track Books </h1>
  <a href="track_books.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
<div>
  <h1> User Interface </h1>
  <a href="user_interface.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
</html>
</body>
