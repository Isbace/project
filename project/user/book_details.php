<?php session_start(); ?>
<?php
include("db_connection.php");
include ("Header.php");
?>

<?php
  $id = $_GET['id'];
  $user=($_SESSION['userid']);  
?>

<html>
	<head>
	</head>
	<body style="background-color:#FFF8DC;">

	<?php
		
		$book_id = $_GET['id'];
		$sql = "SELECT * FROM books WHERE id = $book_id";
		$result = $connect->query($sql);
		$row = $result->fetch_assoc();
		
		echo "<img src='" . $row['cover_img'] . "' style='float: left; margin-right: 20px;' width='350' height='450'>";
		echo "<h2>" . $row['book_title'] . "</h2>";
		echo "<p><b name='author'>Author:</b> " . $row['author'] . "</p>";
		echo "<p><b name='genera'>Genre:</b> " . $row['type_of_book'] . "</p>";
		echo "<p><b name='publisher'>Publisher:</b> " . $row['publisher'] . "</p>";
		echo "<p><b name='year'>Year:</b> " . $row['year_of_release'] . "</p>";
		echo "<p><b name='price'>Price:</b> $" . $row['price'] . "</p>";
		echo "<p><b name='description'>Description:</b> " . $row['information'] . "</p>";
		
		
		echo "<form id='add-to-cart-form' method='POST'>";
		echo "<input type='hidden' name='id' value='" . $id . "'>";
		echo "<input type='hidden' name='book_title' value=\"" . $row['book_title'] . "\">";
		echo "<input type='hidden' name='price' value='" . $row['price'] . "'>";
		echo "<label name='dol' for='date_of_lending'>Date of lending:</label>";
		echo "<input type='date' id='date_of_lending' name='date_of_lending' required>";
		echo "<label name='dor' for='date_of_return'>Date of return:</label>";
		echo "<input type='date' id='date_of_return' name='date_of_return' required>";
		echo "<label name='remarks' for='remarks' >Remarks:</label>";
		echo "<input type='text' id='remarks' name='remarks'>";
		echo "<label name='status' for='status'>Status:</label>";
		echo "<input type='text' id='status' name='status'";
		echo "<br>";

		echo "<button type='submit'>Check-Out</button>";
		echo "</form>";

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$book_id = $_POST['id'];
			// apostrophes need to be sanatized for the SQL query
			$book_title = str_replace("'", "''", $_POST['book_title']);
			$date_of_lending = $_POST['date_of_lending'];
			$date_of_return = $_POST['date_of_return'];
			$remarks = $_POST['remarks'];
			$status = $_POST['status'];
			
			$sql = "SELECT availability_status FROM books WHERE id = '$book_id'";
			$result = $connect->query($sql);
			$row = $result->fetch_assoc();

			if ($row['availability_status'] == 'Available') {
				$sql = "UPDATE books SET availability_status = 'Not Available' WHERE id = '$book_id'";
				$result = $connect->query($sql);
				
				$sql = "UPDATE users_tab SET my_books = CONCAT(my_books, '$book_title ,') WHERE userid = '$user'";
				$result = $connect->query($sql);


				$sql = "INSERT INTO lending_books (id, book_title, name, date_of_lending, date_of_return, status, remarks) VALUES ('$book_id', '$book_title', '$user', '$date_of_lending', '$date_of_return', '$status', '$remarks')";
				$result = $connect->query($sql);

				if ($result) {
					echo "<p id='100'>The book has been checked out.</p>";
				} else {
					echo "<p id='101'>There has been an error checking out the book.</p>";
				}
			} else {
				echo "<p id='102'>Sorry, this book has already been checked out.</p>";
			}

		}
	?>
	</body>
	<script>
		authors = document.getElementsByName("author");
		generas = document.getElementsByName("genera");
		publishers = document.getElementsByName("publisher");
		years = document.getElementsByName("year");
		prices = document.getElementsByName("price");
		descriptions = document.getElementsByName("description");
		dols = document.getElementsByName("dol");
		dors = document.getElementsByName("dor");
		remarks = document.getElementsByName("remarks");
		statuses = document.getElementsByName("status");
		
		for (var i=0;i<authors.length;i++)
		{
			authors[i].innerHTML = getText(18 + <?php echo $_SESSION['lang'];?>);
			generas[i].innerHTML = getText(19 + <?php echo $_SESSION['lang'];?>);
			publishers[i].innerHTML = getText(20 + <?php echo $_SESSION['lang'];?>);
			years[i].innerHTML = getText(21 + <?php echo $_SESSION['lang'];?>);
			prices[i].innerHTML = getText(22 + <?php echo $_SESSION['lang'];?>);
			descriptions[i].innerHTML = getText(23 + <?php echo $_SESSION['lang'];?>);
			dols[i].innerHTML = getText(26 + <?php echo $_SESSION['lang'];?>);
			dors[i].innerHTML = getText(27 + <?php echo $_SESSION['lang'];?>);
			remarks[i].innerHTML = getText(28 + <?php echo $_SESSION['lang'];?>);
			statuses[i].innerHTML = getText(29 + <?php echo $_SESSION['lang'];?>);
		}
		var t = getText(30 + <?php echo $_SESSION['lang'];?>);
		if (document.getElementById("100") != null)
			document.getElementById("100").innerHTML = t;
		t = getText(31 + <?php echo $_SESSION['lang'];?>);
		if (document.getElementById("101") != null)
			document.getElementById("101").innerHTML = t;
		t = getText(32 + <?php echo $_SESSION['lang'];?>);
		if (document.getElementById("102") != null)
			document.getElementById("102").innerHTML = t;
	</script>
</html>
