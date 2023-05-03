<?php 
session_start(); 
include("db_connection.php"); 
include ("Header.php"); 
$user = $_SESSION['userid']; 

$sql = "SELECT * FROM users_tab WHERE userid != '$user'"; 
$result = $connect->query($sql); 

if (!$result) {
    die("Error en la consulta: " . $connect->error);
}
?>

<html>
<body style="background-color:#FFF8DC;">
<h2>Users Information</h2>

<table border="3" style="border: 1px solid black; background-color:#8C6057; color: white; width: 80%; margin: auto; text-align: center;">
    <thead>
        <tr>
            <th style="text-align: center; height: 50px; vertical-align: middle;">User Id</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">User Name</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">Role</th>
            <th style="text-align: center; height: 50px; vertical-align: middle;">My Books</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td data-th="User ID" style="vertical-align: middle; height: 30px;"><?php echo $row['userid']; ?></td>
            <td data-th="User Name" style="vertical-align: middle; height: 30px;"><?php echo $row['user_name']; ?></td>
            <td data-th="Role" style="vertical-align: middle; height: 30px;"><?php echo $row['role']; ?></td>
            <td data-th="My Books" style="vertical-align: middle; height: 30px;"><?php echo $row['my_books']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<br><br>
</body>
</html>
