<?php
session_start(); 
include("db_connection.php"); 
include("Header.php") ;

$sql = "SELECT * FROM books"; 
$result = $connect->query($sql); 

if (!$result) {
    die("Error en la consulta: " . $connect->error);
}
?>

<html>
<head>
</head>
<body style="background-color:#FFF8DC;">

<a href="books_options.php"><button type="button" style="float:right;">Cancel</button></a>
	  <br><br>
	    <h2>Delete a Book </h2>
		<br>

<?php
  if(isset($_POST['submit'])) {
    $title = $_POST['title'];

    $check_book_query = "SELECT * FROM books WHERE book_title = '$title'";
    $check_book_result = mysqli_query($connect, $check_book_query);

    if(mysqli_num_rows($check_book_result) > 0) {
      $delete_book_query = "DELETE FROM books WHERE book_title = '$title'";
      mysqli_query($connect, $delete_book_query);
      echo "The book '$title' has been eliminated.";
    } else {
      echo "The book '$title' does not exist in the database.";
    }
  }
?>

<form method="POST" action="">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" style="text-align:center" required>
  <br><br>
  <button type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this book?')">Delete book</button>
</form>

</body>
</html>
