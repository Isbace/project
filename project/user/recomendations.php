<?php session_start(); ?>
<?php
include("db_connection.php");
include ("Header.php");
?>

<html>
<head>
</head>
<body style="background-color:#FFF8DC;">


<center> <h2 id="100"> Recommendations </h2> </center>
<script>
  var t = getText(17 + <?php echo $_SESSION['lang'];?>);
  document.getElementById("100").innerHTML = t;
</script>
<br><br>
<?php
    
    $sql = "SELECT * FROM books WHERE best_seller = 'T'";
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()) {
		
		echo "<a href='book_details.php?id=".$row['sid']."'>";
		echo "<img src='" . $row['cover_img'] . "' style='float: left; margin-right: 20px;' width='350' height='450'>";
		echo "<h2>" . $row['book_title'] . "</h2></a>";
		echo "<p><b name='author'>Author:</b> " . $row['author'] . "</p>";
		echo "<p><b name='genera'>Genre:</b> " . $row['type_of_book'] . "</p>";
		echo "<p><b name='publisher'>Publisher:</b> " . $row['publisher'] . "</p>";
		echo "<p><b name='year'>Year:</b> " . $row['year_of_release'] . "</p>";
		echo "<p><b name='price'>Price:</b> $" . $row['price'] . "</p>";
		echo "<p><b name='description'>Description:</b> " . $row['information'] . "</p>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<hr>";
	}
	
?>

<script>
	authors = document.getElementsByName("author");
	generas = document.getElementsByName("genera");
	publishers = document.getElementsByName("publisher");
	years = document.getElementsByName("year");
	prices = document.getElementsByName("price");
	descriptions = document.getElementsByName("description");
	
	for (var i=0;i<authors.length;i++)
	{
		authors[i].innerHTML = getText(18 + <?php echo $_SESSION['lang'];?>);
		generas[i].innerHTML = getText(19 + <?php echo $_SESSION['lang'];?>);
		publishers[i].innerHTML = getText(20 + <?php echo $_SESSION['lang'];?>);
		years[i].innerHTML = getText(21 + <?php echo $_SESSION['lang'];?>);
		prices[i].innerHTML = getText(22 + <?php echo $_SESSION['lang'];?>);
		descriptions[i].innerHTML = getText(23 + <?php echo $_SESSION['lang'];?>);
	}
</script>

</body>
</html>
