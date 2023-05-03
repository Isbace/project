<?php 
session_start(); 
include("db_connection.php"); // Replace with your own database connection file
include("Header.php"); // Replace with your own header file

// Check if the form has been submitted
if(isset($_POST['submit'])) {
  $title = $_POST['book_title'];
  // Check if the book exists in the database
  $check_book_query = "SELECT * FROM books WHERE book_title = '$title'";
  $check_book_result = mysqli_query($connect, $check_book_query);

  if(mysqli_num_rows($check_book_result) > 0) {
    // Get the book data from the database
    $book_data = mysqli_fetch_assoc($check_book_result);
    $book_title = $book_data['book_title'];
    $author = $book_data['author'];
    $publisher = $book_data['publisher'];
    $year_of_release = $book_data['year_of_release'];
    $price = $book_data['price'];
    $availability_status = $book_data['availability_status'];
    $type_of_book = $book_data['type_of_book'];
    $information = $book_data['information'];
    $show_form = true;
  } else {
    echo "The book '$title' does not exist in the database.";
    $show_form = false;
  }
} else {
  $show_form = false;
}

// Check if the form has been submitted and the user clicked the update button
if(isset($_POST['update'])) {
  $title = $_POST['book_title'];
  $author = $_POST['author'];
  $publisher = $_POST['publisher'];
  $year_of_release = $_POST['year_of_release'];
  $price = $_POST['price'];
  $availability_status = $_POST['availability_status'];
  $type_of_book = $_POST['type_of_book'];
  $information = $_POST['information'];

  // Update the book in the database
  $update_book_query = "UPDATE books SET book_title = '$title', author = '$author', publisher = '$publisher', year_of_release = '$year_of_release', price = '$price', availability_status = '$availability_status', type_of_book = '$type_of_book', information = '$information' WHERE book_title = '$title'";
  mysqli_query($connect, $update_book_query);

  echo "The book '$title' has been updated.";
  $show_form = false;
}

?>
<html>
<head>
</head>
<body style="background-color:#FFF8DC;">

<a href="books_options.php"><button type="button" style="float:right;">Cancel</button></a>
<br><br>
<h2>Change Book Information</h2>
<br>

<?php
if($show_form) {
?>
  <form method="POST" action="">
    <label for="book_title">Title:</label>
    <input type="text" name="book_title" id="book_title" style="text-align:center" value="<?php echo $book_title ?>" required>
    <br><br>
    <label for="author">Author:</label>
    <input type="text" name="author" id="author" style="text-align:center" value="<?php echo $author ?>" required>
    <br><br>
    <label for="publisher">Publisher:</label>
    <input type="text" name="publisher" id="publisher" style="text-align:center" value="<?php echo $publisher ?>" required>
    <br><br>
    <label for="year_of_release">Year of Release:</label>
    <input type="text" name="year_of_release" id="year_of_release" style="text-align:center" value="<?php echo $year_of_release ?>" required>
    <br><br>
    <label for="price">Price:</label>
    <input type="text" name="price" id="price" style="text-align:center" value="<?php echo $price ?>" required>
    <br><br>
    <label for="availability_status">Availability Status:</label>
    <input type="text" name="availability_status" id="availability_status" style="text-align:center" value="<?php echo $availability_status ?>" required>
    <br><br>
    <label for="type_of_book">Type of Book:</label>
    <input type="text" name="type_of_book" id="type_of_book" style="text-align:center" value="<?php echo $type_of_book ?>" required>
    <br><br>
    <label for="information">Information:</label>
    <textarea name="information" id="information" rows="5" cols="30" required><?php echo $information ?></textarea>
    <br><br>
    
    <button type="submit" name="update">Update Book</button>
  </form>
<?php
} else {
?>
  <form method="POST" action="">
    <label for="book_title">Title:</label>
    <input type="text" name="book_title" id="book_title" style="text-align:center" required>
    <br><br>
    <button type="submit" name="submit">Edit Book</button>
  </form>
<?php
}
?>

</body>
</html>
