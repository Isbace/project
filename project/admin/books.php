<?php 
session_start(); 
include("db_connection.php"); 
include ("Header.php"); 


$sql = "SELECT * FROM books"; 
$result = $connect->query($sql); 

if (!$result) {
    die("Error en la consulta: " . $connect->error);
}
?>

<html>
<body style="background-color:#FFF8DC;">
<h2>Books Information</h2>

<table border="3" style="border: 1px solid black; background-color:#8C6057; color: white; width: 80%; margin: auto; text-align: center;">
    <thead>
        <tr>
            <th style="text-align: center; height: 50px; vertical-align: middle;">Book Title</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">Author</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">Price</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td data-th="Book Title" style="vertical-align: middle; height: 30px;"><?php echo $row['book_title']; ?></td>
            <td data-th="Author" style="vertical-align: middle; height: 30px;"><?php echo $row['author']; ?></td>
            <td data-th="Price" style="vertical-align: middle; height: 30px;"><?php echo "$".$row['price']; ?></td>
            <td data-th="Status" style="vertical-align: middle; height: 30px;"><?php echo $row['availability_status']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<br><br>
</body>
</html>
