<?php
session_start(); 
include("db_connection.php"); 
include ("Header.php"); 
?>

<html>
<body style="background-color:#FFF8DC;">

<div>
  <h1>Add a book</h1>
  <a href="add_book.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
<div>
  <h1>Delete a book</h1>
    <a href="delete_books.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
<div>
  <h1> Change book information </h1>
  <a href="change_books_information.php"><button style="background-color: #8C6057;"> Go to next page </button></a>
  <br />
</div>
<hr />
</html>
</body>
