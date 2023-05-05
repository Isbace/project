<?php session_start(); ?>
<?php
include("db_connection.php");
include ("Header.php");
?>
<?php   
	$user=($_SESSION['userid']);  
	if(isset($_POST['return_book'])) {
		$book_title = $_POST['book_title'];
		$sql = "UPDATE users_tab SET my_books = REPLACE(REPLACE(my_books, '$book_title,', ''), '$book_title', '') WHERE userid = '$user'";
		$result = $connect->query($sql);
		if ($result) {
			$sql2 = "UPDATE books SET availability_status = 'Available' WHERE book_title = '$book_title'";
			$result2 = $connect->query($sql2);		
			$sql3 = "DELETE FROM lending_books WHERE book_title = '$book_title'";
			$result3 = $connect->query($sql3);			
		} 
	}
?>

<html>
<head>
</head>
<body style="background-color:#FFF8DC;">


<center> <h2 id="100"> Return Books </h2> </center>
<br><br>

 <?php

$sql = "SELECT my_books FROM users_tab WHERE userid = '$user'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  $my_books = $result->fetch_assoc()['my_books'];
  $book_titles = explode(",", $my_books);

  // Buscar los libros en la tabla "books"
  foreach ($book_titles as $book_title) {
    $book_title = trim($book_title); // eliminar espacios en blanco al inicio y al final
		$book_title = str_replace("'", "''", $book_title); // apostrophes need to be sanatized for the SQL query
    $sql2 = "SELECT * FROM books WHERE book_title = '" . $book_title . "'";
    $result2 = $connect->query($sql2);

    // Imprimir la información del libro encontrado
    if ($result2->num_rows > 0) {
      $row2 = $result2->fetch_assoc();
      echo "<img src='" . $row2['cover_img'] . "' style='float: left; margin-right: 20px;' width='350' height='450'>";
      echo "<h2>" . $row2['book_title'] . "</h2>";
      echo "<p><b name='author'>Author:</b> " . $row2['author'] . "</p>";
      echo "<p><b name='genera'>Genre:</b> " . $row2['type_of_book'] . "</p>";
      echo "<p><b name='publisher'>Publisher:</b> " . $row2['publisher'] . "</p>";
      echo "<p><b name='year'>Year:</b> " . $row2['year_of_release'] . "</p>";
      echo "<p><b name='price'>Price:</b> $" . $row2['price'] . "</p>";
      echo "<p><b name='description'>Description:</b> " . $row2['information'] . "</p>";
			echo "<form method='post'>";
      echo "<input type='hidden' name='book_title' value=\"$book_title\">";
      echo "<input type='submit' name='return_book' value='Regresar Libro'>";
      echo "</form>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
    } 	
  }
} 

?>
<span id="101">You do not have more books to return</span>
<script>
	authors = document.getElementsByName("author");
	generas = document.getElementsByName("genera");
	publishers = document.getElementsByName("publisher");
	years = document.getElementsByName("year");
	prices = document.getElementsByName("price");
	descriptions = document.getElementsByName("description");
	returns = document.getElementsByName("return");
	
	for (var i=0;i<authors.length;i++)
	{
		authors[i].innerHTML = getText(18 + <?php echo $_SESSION['lang'];?>);
		generas[i].innerHTML = getText(19 + <?php echo $_SESSION['lang'];?>);
		publishers[i].innerHTML = getText(20 + <?php echo $_SESSION['lang'];?>);
		years[i].innerHTML = getText(21 + <?php echo $_SESSION['lang'];?>);
		prices[i].innerHTML = getText(22 + <?php echo $_SESSION['lang'];?>);
		descriptions[i].innerHTML = getText(23 + <?php echo $_SESSION['lang'];?>);
		returns[i].value = getText(24 + <?php echo $_SESSION['lang'];?>);
	}
	
	var t = getText(13 + <?php echo $_SESSION['lang'];?>);
	document.getElementById("100").innerHTML = t;
	t = getText(25 + <?php echo $_SESSION['lang'];?>);
	document.getElementById("101").innerHTML = t;
</script>

</body>
</html>
