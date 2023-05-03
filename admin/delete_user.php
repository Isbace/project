<?php 
session_start(); 
include("db_connection.php"); 
include("Header.php") ;
$sql = "SELECT * FROM users_tab"; 
$result = $connect->query($sql); 
if (!$result) {
    die("Error en la consulta: " . $connect->error);
}
?>
<html>
<head>
</head>
<body style="background-color:#FFF8DC;">

<a href="users_options.php"><button type="button" style="float:right;">Cancel</button></a>
	  <br><br>
	    <h2>Delete a User </h2>
		<br>
		
<?php
  if(isset($_POST['submit'])) {
    $user = $_POST['Username'];

    $check_book_query = "SELECT * FROM users_tab WHERE user_name = '$user'";
    $check_book_result = mysqli_query($connect, $check_book_query);

    if(mysqli_num_rows($check_book_result) > 0) {
      $delete_book_query = "DELETE FROM users_tab WHERE user_name = '$user' AND userid != 'admin'";
      mysqli_query($connect, $delete_book_query);
      echo "The user '$user' has been eliminated.";
    } else {
      echo "The user '$user' does not exist in the database.";
    }
  }
?>

<form method="POST" action="">
  <label for="Username">Username:</label>
  <input type="text" name="Username" id="Username" style="text-align:center" required>
  <br><br>
  <button type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete user</button>
</form>



</body>
</html>
