
<!DOCTYPE html>
<html>
<body style="background-color:#FFF8DC;">

<?php 
include("db_connection.php");


$book_title=($_POST['book_title']);
$author=($_POST['author']);
$publisher=($_POST['publisher']);
$year_of_release=($_POST['year_of_release']);
$price=($_POST['price']);
$type_of_book=($_POST['type_of_book']);
$information=($_POST['information']);
$lid = rand(1,10000);


$sql = "INSERT INTO books (sid, book_title, author, publisher, year_of_release, price, availability_status, type_of_book, information)
		VALUES ('$lid', '$book_title', '$author', '$publisher', '$year_of_release', '$price', 'Available', '$type_of_book', '$information')";
$result = $connect->query($sql);
if($result == FALSE)
{
	include("error_page.php");
}
else
{
	include("books_options.php");
}

?>


</html>