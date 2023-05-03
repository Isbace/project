<?php 
session_start(); 
include("db_connection.php"); 
include("Header.php") ?>

<html>
<head>
</head>
<body style="background-color:#FFF8DC;">

<a href="books_options.php"><button type="button" style="float:right;">Cancel</button></a>

	  <br><br>
<div class="form-container">
  <h2>Add New Book</h2>
  <form method="POST" action="addbook_process.php">
  <div class="form-group">
      <label for="book_title">Enter the Book Title:</label>
      <input type="text" name="book_title" = "book_title" required>
    </div>
    <div class="form-group">
      <label for="author">Enter the Author:</label>
      <input type="text" name="author" = "author" required>
    </div>
	<div class="form-group">
      <label for="publisher">Enter the Publisher:</label>
      <input type="text" name="publisher" = "publisher" required>
    </div>
	<div class="form-group">
      <label for="year_of_release">Enter the Year of Release:</label>
      <input type="text" name="year_of_release" = "year_of_release" required>
    </div>
	<div class="form-group">
      <label for="price">Enter the Price:</label>
      <input type="text" name="price" = "price" required>
    </div>
	<div class="form-group">
      <label for="type_of_book">Enter the Type of Book:</label>
      <input type="text" name="type_of_book" = "type_of_book" required>
    </div>
	<div class="form-group">
      <label for="information">Enter the information:</label>
      <input type="text" name="information" = "information" required>
    </div>
	<br>
    <div class="form-group">
      <button type="submit">New Book</button>
    </div>
  </form>
</div>

</body>
</html>