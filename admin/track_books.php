<?php 
session_start(); 
include("db_connection.php"); 
include ("Header.php"); 
$user = $_SESSION['userid']; 

$sql = "SELECT * FROM lending_books"; 
$result = $connect->query($sql); 

if (!$result) {
    die("Error en la consulta: " . $connect->error);
}
?>

<html>
<body style="background-color:#FFF8DC;">
<h2>Track Books Information</h2>

<table border="3" style="border: 1px solid black; background-color:#8C6057; color: white; width: 80%; margin: auto; text-align: center;">
    <thead>
        <tr>
            <th style="text-align: center; height: 50px; vertical-align: middle;">Book Title</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">User Name</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">Date of lending</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">Date of return</th>
			<th style="text-align: center; height: 50px; vertical-align: middle;">Status</th>
			<th style="text-align: center; height: 50px; vertical-align: middle;">Remarks</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td data-th="Book Title" style="vertical-align: middle; height: 30px;"><?php echo $row['book_title']; ?></td>
            <td data-th="User Name" style="vertical-align: middle; height: 30px;"><?php echo $row['name']; ?></td>
            <td data-th="Date of lending" style="vertical-align: middle; height: 30px;"><?php echo $row['date_of_lending']; ?></td>
            <td data-th="Date of return" style="vertical-align: middle; height: 30px;"><?php echo $row['date_of_return']; ?></td>
			<td data-th="Status" style="vertical-align: middle; height: 30px;"><?php echo $row['status']; ?></td>
			<td data-th="Remarks" style="vertical-align: middle; height: 30px;"><?php echo $row['remarks']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<br><br>
</body>
</html>